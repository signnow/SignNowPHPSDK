<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Document;

use SignNow\Api\Document\Request\DocumentMergePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentMergeTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentMerge();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentMerge(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('merge_documents', 'post');
        $faker = $this->faker();

        $request = new DocumentMergePost(
            $faker->name(),
            $faker->documentDocumentMergeDocumentIds(),
            $faker->boolean()
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getDocumentId()));
        assert($expectation->getDocumentId() === $response->getDocumentId()->toArray());
    }
}
