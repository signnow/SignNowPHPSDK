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

namespace SignNow\Sdk\Tests\EmbeddedSending;

use SignNow\Api\EmbeddedSending\Request\DocumentEmbeddedSendingLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentEmbeddedSendingLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentEmbeddedSendingLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentEmbeddedSendingLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_embedded_sending_link', 'post');
        $faker = $this->faker();

        $request = new DocumentEmbeddedSendingLinkPost(
            $faker->type(),
            $faker->redirectUri(),
            $faker->linkExpiration(),
            $faker->redirectTarget()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
    }
}
