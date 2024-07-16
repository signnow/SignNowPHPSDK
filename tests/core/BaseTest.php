<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Core;

use Exception;
use SignNow\ApiClient as SignNowApiClient;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk;
use SignNow\Sdk\Tests\Core\Exception\RuntimeTestException;
use SignNow\Sdk\Tests\Core\Mock\Expectation\Expectation;
use SignNow\Sdk\Tests\Core\Mock\Expectation\ExpectationReader;
use SignNow\Sdk\Tests\Core\Mock\Faker;

abstract class BaseTest
{
    /**
     * Run all your specific test cases in this single method
     */
    abstract public function run(): void;

    /**
     * @throws SignNowApiException
     * @throws Exception
     */
    public function client(): SignNowApiClient
    {
        $sdk = new Sdk($this->configPath());

        return $sdk->build()
                   ->authenticate()
                   ->getApiClient();
    }

    public function faker(): Faker
    {
        return new Faker();
    }

    public function expectation(string $name, string $method): Expectation
    {
        return (new ExpectationReader())->get($name, $method);
    }

    private function configPath(): string
    {
        $configDir = dirname(__DIR__, 2) . '/.env.test';

        if (!is_file($configDir)) {
            throw new RuntimeTestException(
                sprintf(
                    'Configuration to run tests is not provided. Please, put your ".env.test" in "%s" and try again.',
                    $configDir
                )
            );
        }

        return $configDir;
    }
}
