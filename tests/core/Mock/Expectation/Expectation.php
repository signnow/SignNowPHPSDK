<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Core\Mock\Expectation;

use SignNow\Sdk\Tests\Core\Exception\RuntimeTestException;

readonly class Expectation
{
    public function __construct(
        private string $name,
        private array $data,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
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
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $value));
    }
}
