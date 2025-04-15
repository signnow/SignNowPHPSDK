<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Core\Response;

use Psr\Http\Message\ResponseInterface;
use Random\RandomException;
use SplFileInfo;

readonly class FileDownloader
{
    public function __construct(
        private string $downloadDirectory,
    ) {
    }

    public function getFile(ResponseInterface $response): SplFileInfo
    {
        $fileName = $this->extractOrGenerateFileName($response);

        $content = $response->getBody()->getContents();
        $filePath = rtrim($this->downloadDirectory, '/') . '/' . $fileName;
        file_put_contents($filePath, $content);

        return new SplFileInfo($filePath);
    }

    private function extractOrGenerateFileName(ResponseInterface $response): string
    {
        $contentDisposition = $response->getHeaderLine('Content-Disposition');

        if (preg_match('/filename\s*=\s*(["\']?)(.*?)\1\s*$/i', $contentDisposition, $matches)) {
            return $matches[2] ?? $this->generateFileName($response);
        }

        return $this->generateFileName($response);
    }

    private function generateFileName(ResponseInterface $response): string
    {
        try {
            $randomName = strtolower(bin2hex(random_bytes(8)));
        } catch (RandomException) {
            $randomName = uniqid($response->getHeaderLine('Content-Length') . microtime(), true);
        }

        $contentType = $response->getHeaderLine('Content-Type');
        $extension = $this->getExtensionFromContentType($contentType);

        return $randomName . '.' . $extension;
    }

    private function getExtensionFromContentType(string $contentType): string
    {
        $contentTypeMap = [
            'application/pdf' => 'pdf',
            'application/zip' => 'zip',
        ];

        $baseType = explode(';', $contentType)[0];

        return $contentTypeMap[$baseType] ?? 'bin';
    }
}
