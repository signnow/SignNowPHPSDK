<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Document;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\DocumentCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Invite;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\InviteCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Signer;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\SignerCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\GroupInviteLinkPost as EmbeddedGroupInviteLinkPost;
use SignNow\Api\EmbeddedGroupInvite\Response\GroupInviteLinkPost as EmbeddedGroupInviteLinkResponse;
use SignNow\Api\EmbeddedGroupInvite\Request\GroupInvitePost as EmbeddedGroupInvitePost;
use SignNow\Api\EmbeddedGroupInvite\Response\GroupInvitePost as EmbeddedGroupInvitePostResponse;
use SignNow\ApiClient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to create an embedded group invite
 * with two signers and two documents
 *
 * Presets:
 * - two documents with fields and roles 'Manager' and 'Department Manager" are uploaded
 * - a document group is created of these two documents
 *
 * You can get the document IDs and document group ID
 * from the previous example:
 * - {{APP_DIR}}/examples/document_group/document_group.php
 */
try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $documentId1 = 'YOUR_DOCUMENT_1_ID_HERE';
    $documentId2 = 'YOUR_DOCUMENT_2_ID_HERE';
    $documentGroupId = 'YOUR_DOCUMENT_GROUP_ID_HERE';
    $signer1Role = 'Manager';
    $signer2Role = 'Department Manager';
    $signer1Email = 'signer@signnow.com';
    $signer2Email = 'signer+1@signnow.com';

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
