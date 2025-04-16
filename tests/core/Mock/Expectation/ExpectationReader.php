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

namespace SignNow\Sdk\Tests\Core\Mock\Expectation;

use JsonException;
use SignNow\Sdk\Tests\Core\Exception\RuntimeTestException;

class ExpectationReader
{
    private const JSON_EXTENSION = '.json';

    private string $expectationDirectory;

    public function __construct()
    {
        $this->expectationDirectory = $this->readExpectationDirectory();
    }

    public function get(string $actionName, string $methodName): Expectation
    {
        $fileName = $this->getExpectationFileName($actionName, $methodName);
        $path = $this->getExpectationFilePath($fileName);

        if (!is_file($path)) {
            throw new RuntimeTestException(
                sprintf(
                    'Not found expectation file %s in %s.',
                    $fileName,
                    $this->getExpectationDirectory()
                )
            );
        }

        try {
            $expectation = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

            return new Expectation(
                $fileName,
                json_decode($expectation['then']['response']['body'] ?? '{}', true, 512, JSON_THROW_ON_ERROR),
            );
        } catch (JsonException $exception) {
            throw new RuntimeTestException(
                sprintf(
                    'Failed to load Expectation file %s from %s.',
                    $fileName,
                    $this->getExpectationDirectory()
                ),
                0,
                $exception
            );
        }
    }

    public function getExpectationDirectory(): string
    {
        return $this->expectationDirectory;
    }

    private function readExpectationDirectory(): string
    {
        $configPath = dirname(__DIR__, 4) . '/.phiremock';
        $phiReMockConfig = require $configPath;

        if (!isset($phiReMockConfig['expectations-dir'])) {
            throw new RuntimeTestException('Not found required key "expectations-dir" in .phiremock config file.');
        }

        return $phiReMockConfig['expectations-dir'];
    }

    private function getExpectationFilePath(string $fileName): string
    {
        return $this->expectationDirectory . '/' . $fileName;
    }

    private function getExpectationFileName(string $actionName, string $methodName): string
    {
        return $actionName . '_' . strtolower($methodName) . self::JSON_EXTENSION;
    }
}
