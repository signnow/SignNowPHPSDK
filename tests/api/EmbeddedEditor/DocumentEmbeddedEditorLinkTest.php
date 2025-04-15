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

namespace SignNow\Sdk\Tests\EmbeddedEditor;

use SignNow\Api\EmbeddedEditor\Request\DocumentEmbeddedEditorLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentEmbeddedEditorLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentEmbeddedEditorLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentEmbeddedEditorLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_embedded_editor_link', 'post');
        $faker = $this->faker();

        $request = new DocumentEmbeddedEditorLinkPost(
            $faker->redirectUri(),
            $faker->redirectTarget(),
            $faker->linkExpiration()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
    }
}
