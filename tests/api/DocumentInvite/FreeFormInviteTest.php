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

namespace SignNow\Sdk\Tests\DocumentInvite;

use SignNow\Api\DocumentInvite\Request\FreeFormInvitePost;
use SignNow\Api\DocumentInvite\Request\FreeFormInviteGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class FreeFormInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostFreeFormInvite();
        $this->testGetFreeFormInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostFreeFormInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_free_form_invite', 'post');
        $faker = $this->faker();

        $request = new FreeFormInvitePost(
            $faker->to(),
            $faker->from(),
            $faker->documentInviteFreeFormInviteCc(),
            $faker->subject(),
            $faker->message(),
            $faker->ccSubject(),
            $faker->ccMessage(),
            $faker->language(),
            $faker->clientTimestamp(false),
            $faker->callbackUrl(),
            $faker->boolean(),
            $faker->redirectUri(),
            $faker->closeRedirectUri(),
            $faker->redirectTarget()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getResult()));
        $this->assertTrue($expectation->getResult() === $response->getResult());
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getCallbackUrl()));
        $this->assertTrue($expectation->getCallbackUrl() === $response->getCallbackUrl());
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetFreeFormInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_free_form_invites', 'get');
        $faker = $this->faker();

        $request = new FreeFormInviteGet();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getMeta()));
        $this->assertTrue($expectation->getMeta() === $response->getMeta()->toArray());
    }
}
