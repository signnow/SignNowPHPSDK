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

namespace SignNow\Sdk\Tests\Auth;

use SignNow\Api\Auth\Request\TokenPost;
use SignNow\Api\Auth\Request\TokenGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class TokenTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostToken();
        $this->testGetToken();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostToken(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('generate_access_token', 'post');
        $faker = $this->faker();

        $request = new TokenPost(
            $faker->username(),
            $faker->password(),
            $faker->grantType(),
            $faker->scope(),
            $faker->code()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_int($response->getExpiresIn()));
        $this->assertTrue($expectation->getExpiresIn() === $response->getExpiresIn());
        $this->assertTrue(is_string($response->getTokenType()));
        $this->assertTrue($expectation->getTokenType() === $response->getTokenType());
        $this->assertTrue(is_string($response->getAccessToken()));
        $this->assertTrue($expectation->getAccessToken() === $response->getAccessToken());
        $this->assertTrue(is_string($response->getRefreshToken()));
        $this->assertTrue($expectation->getRefreshToken() === $response->getRefreshToken());
        $this->assertTrue(is_string($response->getScope()));
        $this->assertTrue($expectation->getScope() === $response->getScope());
        $this->assertTrue(is_int($response->getLastLogin()));
        $this->assertTrue($expectation->getLastLogin() === $response->getLastLogin());
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetToken(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('verify_access_token', 'get');
        $request = new TokenGet();
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getAccessToken()));
        $this->assertTrue($expectation->getAccessToken() === $response->getAccessToken());
        $this->assertTrue(is_string($response->getScope()));
        $this->assertTrue($expectation->getScope() === $response->getScope());
        $this->assertTrue(is_string($response->getExpiresIn()));
        $this->assertTrue($expectation->getExpiresIn() === $response->getExpiresIn());
        $this->assertTrue(is_string($response->getTokenType()));
        $this->assertTrue($expectation->getTokenType() === $response->getTokenType());
    }
}
