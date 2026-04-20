<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Recipient;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Reminder;
use SignNow\Api\DocumentGroupTemplate\Request\DocumentGroupTemplateRecipientsGet;
use SignNow\Api\DocumentGroupTemplate\Request\DocumentGroupTemplateRecipientsPut;
use SignNow\Api\DocumentGroupTemplate\Response\DocumentGroupTemplateRecipientsPut as DGTRecipientsPutResponse;
use SignNow\Api\DocumentGroupTemplate\Response\DocumentGroupTemplateRecipientsGet as DGTRecipientsGetResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to get and update recipients for a document group template.
 */
try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()->withBearerToken(new BearerToken($bearerToken))->getApiClient();

    // Replace with your actual template group ID
    $templateGroupId = $data->getDocumentGroupTemplateRecipientsTemplateId();

    // Get document group template recipients
    $request = new DocumentGroupTemplateRecipientsGet();
    $request->withTemplateGroupId($templateGroupId);

    /** @var DGTRecipientsGetResponse $response */
    $response = $apiClient->send($request);

    $data = $response->getData();
    $recipients = $data->getRecipients()->toArray();

    $generalExpirationDays = $data->getGeneralExpirationDays();
    $orderType = $data->getOrderType();

    // Update recipients with new settings
    $request = new DocumentGroupTemplateRecipientsPut(
        new RecipientCollection(array_map(static fn(array $r): Recipient => Recipient::fromArray($r), $recipients)),
        new CcCollection($data->getCc()->toArray()),
        generalExpirationDays: 30,
        generalReminder: new Reminder(remindAfter: 1, remindBefore: 7, remindRepeat: 3),
        orderType: "recipient_order",
    );
    $request->withTemplateGroupId($templateGroupId);

    /** @var DGTRecipientsPutResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
