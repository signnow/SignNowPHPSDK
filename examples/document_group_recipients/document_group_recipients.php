<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsPut;
use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Recipient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to get and update email for document group recipient.
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    $documentGroupId = '5d66ca4accdd4ab28f8b2c71001093b5cb3bcb8a'; // Replace with your actual document group ID
    $request = new \SignNow\Api\DocumentGroup\Request\DocumentGroupRecipientsGet();
    $request->withDocumentGroupId($documentGroupId);

    /** @var \SignNow\Api\DocumentGroup\Response\DocumentGroupRecipientsGet $response */
    $response = $apiClient->send($request);

    $recipients = $response->getData()->getRecipients()->toArray();

    //update email for recipient with name 'Recipient 1'
    foreach ($recipients as $k => $recipient) {
        if ($recipient['name'] === 'Recipient 1') {
            $recipient[$k]['email'] = 'test@email.t';
        }
    }
    $request = new DocumentGroupRecipientsPut(
        new RecipientCollection(
            array_map(static fn(array $r): Recipient => Recipient::fromArray($r), $recipients)
        ),
        new CcCollection($response->getData()->getCc()->toArray())
    );
    $request->withDocumentGroupId($documentGroupId);
    /** @var \SignNow\Api\DocumentGroup\Response\DocumentGroupRecipientsPut $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
