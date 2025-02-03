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

namespace SignNow\Sdk\Tests\Document;

use SignNow\Api\Document\Request\DocumentMovePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentMoveTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentMove();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentMove(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('move_document', 'post');
        $faker = $this->faker();

        $request = new DocumentMovePost(
            $faker->folderId()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getResult()));
        assert($expectation->getResult() === $response->getResult());
    }
}
