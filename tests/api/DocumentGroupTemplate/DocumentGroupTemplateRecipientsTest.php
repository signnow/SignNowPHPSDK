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

namespace SignNow\Sdk\Tests\DocumentGroupTemplate;

use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Recipient;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Reminder;
use SignNow\Api\DocumentGroupTemplate\Request\DocumentGroupTemplateRecipientsGet;
use SignNow\Api\DocumentGroupTemplate\Request\DocumentGroupTemplateRecipientsPut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentGroupTemplateRecipientsTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetDocumentGroupTemplateRecipients();
        $this->testPutDocumentGroupTemplateRecipients();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetDocumentGroupTemplateRecipients(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_group_template_recipients', 'get');
        $faker = $this->faker();

        $request = new DocumentGroupTemplateRecipientsGet();
        $request->withTemplateGroupId($faker->templateGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());

        $data = $response->getData();
        $this->assertTrue($data->getGeneralExpirationDays() === $expectation->getData()['general_expiration_days']);
        $this->assertTrue($data->getGeneralReminder()->toArray() === $expectation->getData()['general_reminder']);
        $this->assertTrue($data->getOrderType() === $expectation->getData()['order_type']);
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutDocumentGroupTemplateRecipients(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('update_document_group_template_recipients', 'put');
        $faker = $this->faker();

        $resp = $expectation->toArray()['data'];
        $recipients = new RecipientCollection(
            array_map(static fn($r) => Recipient::fromArray($r), $resp['recipients'])
        );
        $cc = new CcCollection();
        foreach ($resp['cc'] as $c) {
            $cc->add($c);
        }

        $generalReminder = isset($resp['general_reminder'])
            ? Reminder::fromArray($resp['general_reminder'])
            : null;

        $request = new DocumentGroupTemplateRecipientsPut(
            $recipients,
            $cc,
            $resp['general_expiration_days'] ?? null,
            $generalReminder,
            $resp['order_type'] ?? null,
        );
        $request->withTemplateGroupId($faker->templateGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());

        $data = $response->getData();
        $this->assertTrue($data->getGeneralExpirationDays() === $expectation->getData()['general_expiration_days']);
        $this->assertTrue($data->getGeneralReminder()->toArray() === $expectation->getData()['general_reminder']);
        $this->assertTrue($data->getOrderType() === $expectation->getData()['order_type']);
    }
}
