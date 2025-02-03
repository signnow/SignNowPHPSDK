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

use SignNow\Api\Auth\Request\RefreshTokenPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class RefreshTokenTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostRefreshToken();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostRefreshToken(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('refresh_access_token', 'post');
        $faker = $this->faker();

        $request = new RefreshTokenPost(
            $faker->refreshToken(),
            $faker->scope(),
            $faker->expirationTime(),
            $faker->grantType()
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_int($response->getExpiresIn()));
        assert($expectation->getExpiresIn() === $response->getExpiresIn());
        assert(is_string($response->getTokenType()));
        assert($expectation->getTokenType() === $response->getTokenType());
        assert(is_string($response->getAccessToken()));
        assert($expectation->getAccessToken() === $response->getAccessToken());
        assert(is_string($response->getRefreshToken()));
        assert($expectation->getRefreshToken() === $response->getRefreshToken());
        assert(is_string($response->getScope()));
        assert($expectation->getScope() === $response->getScope());
        assert(is_int($response->getLastLogin()));
        assert($expectation->getLastLogin() === $response->getLastLogin());
    }
}
