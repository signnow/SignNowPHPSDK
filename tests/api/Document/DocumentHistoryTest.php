<?php

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

        assert(is_object($response));
        assert(is_string($response->getUniqueId()));
        assert($expectation->getUniqueId() === $response->getUniqueId());
        assert(is_string($response->getUserId()));
        assert($expectation->getUserId() === $response->getUserId());
        assert(is_string($response->getDocumentId()));
        assert($expectation->getDocumentId() === $response->getDocumentId());
        assert(is_string($response->getClientAppName()));
        assert($expectation->getClientAppName() === $response->getClientAppName());
        assert(is_string($response->getIpAddress()));
        assert($expectation->getIpAddress() === $response->getIpAddress());
        assert(is_string($response->getEmail()));
        assert($expectation->getEmail() === $response->getEmail());
        assert(is_string($response->getFieldId()));
        assert($expectation->getFieldId() === $response->getFieldId());
        assert(is_string($response->getElementId()));
        assert($expectation->getElementId() === $response->getElementId());
        assert(is_object($response->getJsonAttributes()));
        assert($expectation->getJsonAttributes() === $response->getJsonAttributes()->toArray());
        assert(is_int($response->getClientTimestamp()));
        assert($expectation->getClientTimestamp() === $response->getClientTimestamp());
        assert(is_int($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
        assert(is_string($response->getOrigin()));
        assert($expectation->getOrigin() === $response->getOrigin());
        assert(is_string($response->getEvent()));
        assert($expectation->getEvent() === $response->getEvent());
    }
}
