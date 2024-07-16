<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\User;

use SignNow\Api\User\Request\InitialGet;
use SignNow\Api\User\Request\InitialPut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class InitialTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetInitial();
        $this->testPutInitial();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetInitial(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_user_initials', 'get');
        $request = new InitialGet();
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getUniqueId()));
        assert($expectation->getUniqueId() === $response->getUniqueId());
        assert(is_string($response->getWidth()));
        assert($expectation->getWidth() === $response->getWidth());
        assert(is_string($response->getHeight()));
        assert($expectation->getHeight() === $response->getHeight());
        assert(is_string($response->getData()));
        assert($expectation->getData() === $response->getData());
        assert(is_string($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutInitial(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('update_user_initials', 'put');
        $faker = $this->faker();

        $request = new InitialPut(
            $faker->data()
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getWidth()));
        assert($expectation->getWidth() === $response->getWidth());
        assert(is_string($response->getHeight()));
        assert($expectation->getHeight() === $response->getHeight());
        assert(is_string($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
    }
}
