<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Document;

use SignNow\Api\Document\Request\DocumentDownloadGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentDownloadTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetDocumentDownload();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetDocumentDownload(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new DocumentDownloadGet();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
    }
}
