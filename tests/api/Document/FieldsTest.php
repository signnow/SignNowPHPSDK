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

use SignNow\Api\Document\Request\FieldsGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class FieldsTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetFields();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetFields(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_fields', 'get');
        $faker = $this->faker();

        $request = new FieldsGet();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
