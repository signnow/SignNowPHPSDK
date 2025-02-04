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

use SignNow\Api\Document\Request\DocumentDownloadLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentDownloadLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentDownloadLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentDownloadLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_download_link', 'post');
        $faker = $this->faker();

        $request = new DocumentDownloadLinkPost();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getLink()));
        assert($expectation->getLink() === $response->getLink());
    }
}
