<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentInvite;

use SignNow\Api\DocumentInvite\Request\SigningLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class SigningLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostSigningLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostSigningLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_signing_link', 'post');
        $faker = $this->faker();

        $request = new SigningLinkPost(
            $faker->documentId(),
            $faker->redirectUri()
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getUrl()));
        assert($expectation->getUrl() === $response->getUrl());
        assert(is_string($response->getUrlNoSignup()));
        assert($expectation->getUrlNoSignup() === $response->getUrlNoSignup());
    }
}
