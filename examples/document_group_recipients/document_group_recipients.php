<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsPut;
use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Recipient;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Reminder;
use SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsGet as DGRecipientsGetRequest;
use SignNow\Api\DocumentGroup\Response\DocumentGroupRecipientsGet as DGRecipientsGetResponse;
use SignNow\Api\DocumentGroup\Response\DocumentGroupRecipientsPut as DGRecipientsPutResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to get and update email for document group recipient.
 */
try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
        ->getApiClient();

    // Replace with your actual document group ID
    $documentGroupId = $data->getDocumentGroupRecipientsDocumentGroupId();

    $request = new DGRecipientsGetRequest();
    $request->withDocumentGroupId($documentGroupId);

    /** @var DGRecipientsGetResponse $response */
    $response = $apiClient->send($request);

    $data = $response->getData();
    $recipients = $data->getRecipients()->toArray();

    // Access optional fields (available depending on API response)
    $generalExpirationDays = $data->getGeneralExpirationDays();
    $generalReminder = $data->getGeneralReminder();
    $orderType = $data->getOrderType();

    // Update email for recipient with name 'Recipient 1'
    foreach ($recipients as $k => $recipient) {
        if ($recipient['name'] === 'Recipient 1') {
            $recipient[$k]['email'] = 'test@email.t';
        }
    }
    $request = new DocumentGroupRecipientsPut(
        new RecipientCollection(
            array_map(static fn(array $r): Recipient => Recipient::fromArray($r), $recipients)
        ),
        new CcCollection($response->getData()->getCc()->toArray()),
        generalExpirationDays: 30,
        generalReminder: new Reminder(
            remindAfter: 1,
            remindBefore: 7,
            remindRepeat: 3,
        ),
        orderType: 'recipient_order',
    );
    $request->withDocumentGroupId($documentGroupId);
    /** @var DGRecipientsPutResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
