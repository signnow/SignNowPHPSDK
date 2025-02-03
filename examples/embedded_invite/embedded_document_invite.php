<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Document\Request\Data\Field;
use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Request\DocumentPut;
use SignNow\Api\Document\Response\DocumentGet as DocumentGetResponse;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\Document\Response\DocumentPut as DocumentPutResponse;
use SignNow\Api\EmbeddedInvite\Request\Data\Invite;
use SignNow\Api\EmbeddedInvite\Request\Data\InviteCollection;
use SignNow\Api\EmbeddedInvite\Request\DocumentInvitePost as EmbeddedInvitePost;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $signerEmail = 'signer@signnow.com';

    // 1. Upload a document
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId = $response->getId();

    // 2. Add fields to the document
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
            role: 'Engineer',
            name: 'text_field',
            label: 'Comments',
        )
    );
    $request = new DocumentPut(
        fields: $fields,
    );
    $request->withDocumentId($response->getId());
    /** @var DocumentPutResponse $response */
    $response = $apiClient->send($request);

    // 3. Get the document by id to retrieve the roles
    $documentId = $response->getId();
    $request = new DocumentGet();
    $request->withDocumentId($documentId);
    /** @var DocumentGetResponse $response */
    $response = $apiClient->send($request);
    $signerRoleId = $response->getRoles()->first();

    // 4. Create an embedded invite to the document
    $invites = new InviteCollection();
    $invites->add(
        new Invite(
            email: $signerEmail,
            roleId: $signerRoleId,
            order: 1,
            authMethod: 'none'
        )
    );
    $request = new EmbeddedInvitePost($invites);
    $request->withDocumentId($documentId);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
