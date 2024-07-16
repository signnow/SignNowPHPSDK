<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Core;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SignNow\Sdk\Tests\Core\Exception\RuntimeTestException;
use SplFileInfo;
use Throwable;

readonly class TestCaseExecutor
{
    private const BASE_TEST_NAMESPACE = 'SignNow\\Sdk\\Tests';

    public function __construct(
        private string $pathToTestCases
    ) {
    }

    public function runAll(): TestCaseResultCollection
    {
        $results = new TestCaseResultCollection();

        $fileIterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($this->pathToTestCases)
        );

        foreach ($fileIterator as $file) {
            /** var SplFileInfo $file */
            if ($file->isDir() && in_array($file->getFilename(), ['.', '..'])) {
                continue;
            }

            $relativePath = ltrim(substr($file->getPathname(), strlen($this->pathToTestCases)), DIRECTORY_SEPARATOR);

            $result = $this->runOne($relativePath);

            $results->add($result);
            $result->displayProcessingMessage();
        }

        return $results;
    }

    /**
     * @throws RuntimeTestException
     */
    public function runOne(string $relativeFilePath): TestCaseResult
    {
        $testCase = $this->getTestCase($relativeFilePath);

        $message = "\033[34mProcessing\033[0m: %s  %s";
        $errors = [];

        try {
            $testCase->run();
            $result = "\033[32mOK\033[0m";
        } catch (Throwable $exception) {
            $result = "\033[31mFAILED\033[0m";
            $errors[] = $this->toMessage($exception);
        }

        return new TestCaseResult(
            $relativeFilePath,
            sprintf($message, $relativeFilePath, $result),
            $errors
        );
    }

    private function getTestCase(string $relativeFilePath): BaseTest
    {
        $path = $this->getTestCaseAbsolutePath($relativeFilePath);
        $className = $this->getTestCaseClassNamespace($relativeFilePath);

        require $path;

        return new $className();
    }

    private function getTestCaseAbsolutePath(string $relativeFilePath): string
    {
        return $this->pathToTestCases . '/' . $relativeFilePath;
    }

    private function getTestCaseClassNamespace(string $path): string
    {
        $file = new SplFileInfo($path);

        return self::BASE_TEST_NAMESPACE . '\\' . $file->getPath() . '\\' . $file->getBasename('.php');
    }

    private function toMessage(Throwable $exception): string
    {
        $previous = $exception->getPrevious();

        $details = '';
        if ($previous !== null) {
            $details = sprintf(
                "\n%s\n%s:%s\n",
                $previous->getMessage(),
                $previous->getFile(),
                $previous->getLine()
            );
        }

        return $exception->getMessage() . $details;
    }
}
