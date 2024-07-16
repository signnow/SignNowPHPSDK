<?php

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

    /**
     * @throws SignNowApiException
     */
    public function testGetToken(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('verify_access_token', 'get');
        $request = new TokenGet();
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getAccessToken()));
        assert($expectation->getAccessToken() === $response->getAccessToken());
        assert(is_string($response->getScope()));
        assert($expectation->getScope() === $response->getScope());
        assert(is_string($response->getExpiresIn()));
        assert($expectation->getExpiresIn() === $response->getExpiresIn());
        assert(is_string($response->getTokenType()));
        assert($expectation->getTokenType() === $response->getTokenType());
    }
}
