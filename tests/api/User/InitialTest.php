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

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getUniqueId()));
        $this->assertTrue($expectation->getUniqueId() === $response->getUniqueId());
        $this->assertTrue(is_string($response->getWidth()));
        $this->assertTrue($expectation->getWidth() === $response->getWidth());
        $this->assertTrue(is_string($response->getHeight()));
        $this->assertTrue($expectation->getHeight() === $response->getHeight());
        $this->assertTrue(is_string($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData());
        $this->assertTrue(is_string($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
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

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getWidth()));
        $this->assertTrue($expectation->getWidth() === $response->getWidth());
        $this->assertTrue(is_string($response->getHeight()));
        $this->assertTrue($expectation->getHeight() === $response->getHeight());
        $this->assertTrue(is_string($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
    }
}
