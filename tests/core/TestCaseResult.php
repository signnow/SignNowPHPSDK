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

namespace SignNow\Sdk\Tests\Core;

readonly class TestCaseResult
{
    public function __construct(
        private string $relativeTestCasePath,
        private string $processingMessage,
        private array $errors = [],
    ) {
    }

    public function getProcessingMessage(): string
    {
        return $this->processingMessage;
    }

    public function isPassed(): bool
    {
        return count($this->errors) === 0;
    }

    public function isFailed(): bool
    {
        return !$this->isPassed();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function displayProcessingMessage(): void
    {
        echo $this->getProcessingMessage(), PHP_EOL;
    }

    public function displayErrors(): void
    {
        echo $this->getRelativeTestCasePath() . ' |' . "\033[31m errors \033[0m:", PHP_EOL;

        foreach ($this->getErrors() as $error) {
            echo "\033[31m > \033[0m", "\033[95m$error\033[0m", PHP_EOL;
        }
    }

    public function getRelativeTestCasePath(): string
    {
        return $this->relativeTestCasePath;
    }
}
