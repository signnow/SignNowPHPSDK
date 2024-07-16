<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentField;

use SignNow\Api\DocumentField\Request\DocumentPrefillPut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentPrefillTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPutDocumentPrefill();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutDocumentPrefill(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new DocumentPrefillPut(
            $faker->documentFieldDocumentPrefillFields()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
    }
}
