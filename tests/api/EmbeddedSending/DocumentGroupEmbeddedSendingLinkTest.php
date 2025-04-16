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

use SignNow\Api\EmbeddedSending\Request\DocumentGroupEmbeddedSendingLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentGroupEmbeddedSendingLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentGroupEmbeddedSendingLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentGroupEmbeddedSendingLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_group_embedded_sending_link', 'post');
        $faker = $this->faker();

        $request = new DocumentGroupEmbeddedSendingLinkPost(
            $faker->redirectUri(),
            $faker->linkExpiration(),
            $faker->redirectTarget()
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
