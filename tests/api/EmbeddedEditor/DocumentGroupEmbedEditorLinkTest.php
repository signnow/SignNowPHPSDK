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

use SignNow\Api\EmbeddedEditor\Request\DocumentGroupEmbeddedEditorLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentGroupEmbedEditorLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentGroupEmbedEditorLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentGroupEmbedEditorLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_group_embedded_editor_link', 'post');
        $faker = $this->faker();

        $request = new DocumentGroupEmbeddedEditorLinkPost(
            $faker->redirectUri(),
            $faker->redirectTarget(),
            $faker->linkExpiration()
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
