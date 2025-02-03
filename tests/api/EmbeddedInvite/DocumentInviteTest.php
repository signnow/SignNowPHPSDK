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

namespace SignNow\Sdk\Tests\EmbeddedInvite;

use SignNow\Api\EmbeddedInvite\Request\DocumentInvitePost;
use SignNow\Api\EmbeddedInvite\Request\DocumentInviteDelete;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentInvite();
        $this->testDeleteDocumentInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_embedded_invite', 'post');
        $faker = $this->faker();

        $request = new DocumentInvitePost(
            $faker->embeddedInviteDocumentInviteInvites(),
            $faker->nameFormula()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testDeleteDocumentInvite(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new DocumentInviteDelete();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
    }
}
