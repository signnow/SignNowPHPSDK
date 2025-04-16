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

use SignNow\Api\Document\Request\DocumentHistoryGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentHistoryTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetDocumentHistory();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetDocumentHistory(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_history_full', 'get');
        $faker = $this->faker();

        $request = new DocumentHistoryGet();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getUniqueId()));
        $this->assertTrue($expectation->getUniqueId() === $response->getUniqueId());
        $this->assertTrue(is_string($response->getUserId()));
        $this->assertTrue($expectation->getUserId() === $response->getUserId());
        $this->assertTrue(is_string($response->getDocumentId()));
        $this->assertTrue($expectation->getDocumentId() === $response->getDocumentId());
        $this->assertTrue(is_string($response->getClientAppName()));
        $this->assertTrue($expectation->getClientAppName() === $response->getClientAppName());
        $this->assertTrue(is_string($response->getIpAddress()));
        $this->assertTrue($expectation->getIpAddress() === $response->getIpAddress());
        $this->assertTrue(is_string($response->getEmail()));
        $this->assertTrue($expectation->getEmail() === $response->getEmail());
        $this->assertTrue(is_object($response->getJsonAttributes()));
        $this->assertTrue($expectation->getJsonAttributes() === $response->getJsonAttributes()->toArray());
        $this->assertTrue(is_int($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
        $this->assertTrue(is_string($response->getEvent()));
        $this->assertTrue($expectation->getEvent() === $response->getEvent());
    }
}
