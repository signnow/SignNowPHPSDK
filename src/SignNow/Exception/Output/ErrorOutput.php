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

namespace SignNow\Exception\Output;

use SignNow\Exception\SignNowApiException;
use Throwable;

class ErrorOutput
{
    public function displayException(Throwable $exception): void
    {
        $this->displayErrorMessage($exception->getMessage());

        if ($exception->getPrevious() !== null) {
            $previous = $exception->getPrevious();
            $this->write('message: ');
            $this->displayRedText($previous->getMessage());
            $this->displayRedText($previous->getFile() . ':' . $previous->getLine());
        }

        if ($exception instanceof SignNowApiException && ($request = $exception->getRequest()) !== null) {
            $this->writeln('request: ');
            $this->displayArrayAsJson($request->uriParams(), 'uri params');
            $this->displayArrayAsJson($request->toArray(), 'payload');
        }
    }

    public function displayErrorMessage(string $message): void
    {
        echo $this->red('ERROR'), ' :', $message, PHP_EOL;
    }

    private function displayRedText(string $message): void
    {
        $this->writeln($this->red($message));
    }

    public function displayArrayAsJson(array $data, string $title = ''): void
    {
        if ($title !== '' && count($data) > 0) {
            echo $this->green($title), PHP_EOL;
        }

        $this->writeln(json_encode($data, JSON_PRETTY_PRINT));
    }

    private function write(string $text): void
    {
        echo $text;
    }

    private function writeln(string $text): void
    {
        echo $text, PHP_EOL;
    }

    private function red(string $message): string
    {
        return "\033[31m$message\033[0m";
    }

    private function green(string $message): string
    {
        return "\033[32m$message\033[0m";
    }
}
