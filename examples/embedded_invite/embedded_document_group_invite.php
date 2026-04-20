<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Document\Request\Data\Field;
use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Request\DocumentPut;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\Document\Response\DocumentPut as DocumentPutResponse;
use SignNow\Api\DocumentGroup\Request\Data\DocumentIdCollection;
use SignNow\Api\DocumentGroup\Request\DocumentGroupPost;
use SignNow\Api\DocumentGroup\Response\DocumentGroupPost as DocumentGroupPostResponse;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Document;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\DocumentCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Invite;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\InviteCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Signer;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\SignerCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\GroupInviteLinkPost as EmbeddedGroupInviteLinkPost;
use SignNow\Api\EmbeddedGroupInvite\Request\GroupInvitePost as EmbeddedGroupInvitePost;
use SignNow\Api\EmbeddedGroupInvite\Response\GroupInviteLinkPost as EmbeddedGroupInviteLinkResponse;
use SignNow\Api\EmbeddedGroupInvite\Response\GroupInvitePost as EmbeddedGroupInvitePostResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to create an embedded group invite
 * with two signers and two documents
 */
try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
        ->getApiClient();

    // source data
    $signer1Role = 'Manager';
    $signer2Role = 'Department Manager';
    $signer1Email = $data->getEmbeddedGroupInviteSigner1Email();
    $signer2Email = $data->getEmbeddedGroupInviteSigner2Email();

    // Preset: upload 1st document and add a field with $signer1Role
    $documentFile = $data->getPathToDocument();
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId1 = $response->getId();

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
            role: $signer1Role,
            name: 'text_field',
            label: 'Decision reason',
        )
    );
    $request = new DocumentPut(fields: $fields);
    $request->withDocumentId($documentId1);
    /** @var DocumentPutResponse $response */
    $apiClient->send($request);

    // Preset: upload 2nd document and add a field with $signer2Role
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId2 = $response->getId();

    $fields = new FieldCollection();
    $fields->add(
        new Field(
            x: 220,
            y: 24,
            width: 142,
            height: 14,
            type: 'text',
            pageNumber: 0,
            required: true,
            role: $signer2Role,
            name: 'text_field',
            label: 'Decision reason',
        )
    );
    $request = new DocumentPut(fields: $fields);
    $request->withDocumentId($documentId2);
    /** @var DocumentPutResponse $response */
    $apiClient->send($request);

    // Preset: create a document group from both documents
    $request = new DocumentGroupPost(
        new DocumentIdCollection([$documentId1, $documentId2]),
        'Test Document Group',
    );
    /** @var DocumentGroupPostResponse $response */
    $response = $apiClient->send($request);
    $documentGroupId = $response->getId();

    $documents = new DocumentCollection();
    $documents->add(
        new Document(
            id: $documentId1,
            action: 'sign',
            role: $signer1Role,
        )
    );
    $signer1 = new Signer(
        email: $signer1Email,
        authMethod: 'none',
        documents: $documents,
        firstName: 'Mr.',
        lastName: 'Rockstar',
        language: 'en',
        redirectUri: 'https://www.signnow.com',
        redirectTarget: 'blank',
    );
    $firstInviteSigners = new SignerCollection();
    $firstInviteSigners->add($signer1);

    // finally, Department Manager as a second signer
    // will sign the second document
    // after the Manager has signed the first document
    $secondInviteSigners = new SignerCollection();
    $documents = new DocumentCollection();
    $documents->add(
        new Document(
            id: $documentId2,
            action: 'sign',
            role: $signer2Role,
        )
    );
    $signer2 = new Signer(
        email: $signer2Email,
        authMethod: 'none',
        documents: $documents
    );
    $secondInviteSigners->add($signer2);

    $invites = new InviteCollection();
    $invites->add(
        new Invite(
            order: 1,
            signers: $firstInviteSigners
        ),
    );
    $invites->add(
        new Invite(
            order: 2,
            signers: $secondInviteSigners
        )
    );

    $request = new EmbeddedGroupInvitePost(
        $invites,
        signAsMerged: true
    );
    $request->withDocumentGroupId($documentGroupId);
    /** @var EmbeddedGroupInvitePostResponse $response */
    $response = $apiClient->send($request);
    $groupInviteId = $response->getData()->getId();

    // Create an embedded invite link for the embedded group invite
    $request = (new EmbeddedGroupInviteLinkPost(
        email: $signer1Email,
        authMethod: 'none',
        linkExpiration: 15,
    ))
        ->withDocumentGroupId($documentGroupId)
        ->withEmbeddedInviteId($groupInviteId);

    /** @var EmbeddedGroupInviteLinkResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
