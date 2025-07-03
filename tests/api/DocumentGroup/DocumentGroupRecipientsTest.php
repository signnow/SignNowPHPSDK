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

use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Recipient;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsGet;
use SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsPut;
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
        $this->testPutDocumentGroupRecipients();
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

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutDocumentGroupRecipients(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('update_document_group_recipients', 'put');
        $faker = $this->faker();


        $resp = $expectation->toArray()['data'];
        $recipients = new RecipientCollection(
            array_map(static fn($r) => Recipient::fromArray($r), $resp['recipients'])
        );
        $cc = new CcCollection();
        foreach ($resp['cc'] as $c) {
            $cc->add($c);
        }
        $request = new DocumentGroupRecipientsPut(
            $recipients,
            $cc,
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
    }
}
