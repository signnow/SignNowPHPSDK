<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Document\Request\DocumentDownloadGet;
use SignNow\Api\Document\Response\DocumentDownloadGet as DocumentDownloadGetResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->getApiClient();

    // Prepare a request to download a document by id
    $documentId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';
    $request = new DocumentDownloadGet();
    $request->withDocumentId($documentId)
        ->withType('collapsed')
        ->withHistory('no');

    /** @var DocumentDownloadGetResponse $response */
    $response = $apiClient->send($request);

    /** @var SplFileInfo $file */
    $downloadedFile = $response->getFile();
    echo $downloadedFile->getPathname() . PHP_EOL;
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}

