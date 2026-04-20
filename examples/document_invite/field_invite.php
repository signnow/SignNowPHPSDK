<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Document\Request\Data\Field;
use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Request\DocumentPut;
use SignNow\Api\Document\Response\DocumentGet as DocumentGetResponse;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\Document\Response\DocumentPut as DocumentPutResponse;
use SignNow\Api\DocumentInvite\Request\Data\To;
use SignNow\Api\DocumentInvite\Request\Data\ToCollection;
use SignNow\Api\DocumentInvite\Request\SendInvitePost;
use SignNow\Api\DocumentInvite\Response\SendInvitePost as SendInvitePostResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
        ->getApiClient();

    // source data
    $senderEmail = $data->getSenderEmail();
    $signerEmail = $data->getFieldInviteSignerEmail();
    $signerRole = $data->getFieldInviteSignerRole();
    $yourDocumentFilePath = $data->getPathToDocument();
    $subject = 'You have got an invitation to sign the contact';
    $message = 'Hello, please read and sign the contract';

    // 1. Upload a document
    $request = new DocumentPost(
        new SplFileInfo($yourDocumentFilePath),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId = $response->getId();

    // 2. Add fields and roles to the document
    $fields = new FieldCollection();
    $fields->add(
        new Field(
            x: 205,
            y: 18,
            width: 122,
            height: 12,
            type: 'text',
            pageNumber: 0,
            required: true,
            role: $signerRole,
            name: 'text_field',
            label: 'Decision reason',
        )
    );
    $request = new DocumentPut(
        fields: $fields,
    );
    $request->withDocumentId($documentId);
    /** @var DocumentPutResponse $response */
    $apiClient->send($request);

    // 3. Get the document by id to retrieve the roles IDs
    $documentId = $response->getId();
    $request = new DocumentGet();
    $request->withDocumentId($documentId);
    /** @var DocumentGetResponse $response */
    $response = $apiClient->send($request);

    // 4. Send an invitation to sign the document
    $roles = $response->getRoles();
    $to = new ToCollection();
    foreach ($roles as $role) {
        $to->add(
            new To(
                $signerEmail,
                $role->getUniqueId(),
                $role->getName(),
                (int) $role->getSigningOrder(),
                $subject,
                $message,
            )
        );
    }

    $request = new SendInvitePost(
        $documentId,
        $to,
        $senderEmail,
        $subject,
        $message
    );
    $request->withDocumentId($documentId);
    /** @var SendInvitePostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
