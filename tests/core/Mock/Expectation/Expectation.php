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

use SignNow\Sdk\Tests\Core\Exception\RuntimeTestException;

readonly class Expectation
{
    private const CAMEL_CASE_EXCEPTION = [
        'googleapps',
        'facebookapps',
        'microsoftapps',
    ];

    public function __construct(
        private string $expectationName,
        private array $data,
    ) {
    }

    public function getExpectationName(): string
    {
        return $this->expectationName;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function __call(string $name, array $arguments)
    {
        if (str_starts_with($name, 'get')) {
            $parts = explode('get', $name);
            $name = (string) $parts[1];
        }

        if (str_starts_with($name, 'is')) {
            $parts = explode('is', $name);
            $name = (string) $parts[1];
        }

        if (str_starts_with($name, 'has')) {
            $parts = explode('has', $name);
            $name = (string) $parts[1];
        }

        if (empty($name)) {
            throw new RuntimeTestException('Invalid expectation method using.');
        }

        $key = $this->convertCamelCaseToSnakeCase($name);

        if (!isset($this->data[$key])) {
            throw new RuntimeTestException('Invalid expectation property is called.');
        }

        return $this->data[$key];
    }

    private function convertCamelCaseToSnakeCase(string $value): string
    {
        if (in_array(strtolower($value), self::CAMEL_CASE_EXCEPTION, true)) {
            return strtolower($value);
        }

        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $value));
    }
}
