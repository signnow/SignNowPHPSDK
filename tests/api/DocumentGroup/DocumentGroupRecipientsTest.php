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

namespace SignNow\Sdk\Tests\DocumentGroup;

use SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentGroupRecipientsTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetDocumentGroupRecipients();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetDocumentGroupRecipients(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_group_recipients', 'get');
        $faker = $this->faker();

        $request = new DocumentGroupRecipientsGet();
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
