<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Document\Request\Data\Field;
use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Request\DocumentPut;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\Document\Response\DocumentPut as DocumentPutResponse;
use SignNow\Api\DocumentGroup\Request\Data\DocumentIdCollection;
use SignNow\Api\DocumentGroup\Request\DocumentGroupPost;
use SignNow\Api\DocumentGroup\Response\DocumentGroupPost as DocumentGroupPostResponse;
use SignNow\Api\DocumentGroupInvite\Request\Data\CcCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteAction;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteActionCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteEmail;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteEmailCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteStep;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteStepCollection;
use SignNow\Api\DocumentGroupInvite\Request\GroupInvitePost;
use SignNow\Api\DocumentGroupInvite\Response\GroupInvitePost as GroupInvitePostResponse;
use SignNow\ApiClient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to send invite to sign for a document group
 */
try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $signerEmail = 'test@signnow.com';
    $signerRole = 'HR Manager';
    $subject = 'Please sign these documents';
    $message = 'Hello, please sign these documents';

    // Step 1: Upload 1st document
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId1 = $response->getId();

    // 2. Add fields and roles to the 1st document
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
            label: 'Test reason',
        )
    );
    $request = new DocumentPut(
        fields: $fields,
    );
    $request->withDocumentId($documentId1);
    /** @var DocumentPutResponse $response */
    $apiClient->send($request);

    // Step 3: Upload 2nd document
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId2 = $response->getId();

    // Step 4: Add fields and roles to the 2nd document
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
            role: $signerRole,
            name: 'text_field',
            label: 'My reason',
        )
    );
    $request = new DocumentPut(
        fields: $fields,
    );
    $request->withDocumentId($documentId2);
    /** @var DocumentPutResponse $response */
    $apiClient->send($request);

    // Step 5: Create document group
    $groupName = 'Test Document Group';
    $request = new DocumentGroupPost(
        new DocumentIdCollection([$documentId1, $documentId2]),
        $groupName,
    );
    /** @var DocumentGroupPostResponse $response */
    $response = $apiClient->send($request);
    $documentGroupId = $response->getId();

    // Step 6: Create group invite
    $inviteSteps = new InviteStepCollection();

    $actions = new InviteActionCollection();
    $actions->add(
        new InviteAction(
            email: $signerEmail,
            roleName: $signerRole,
            action: 'sign',
            documentId: $documentId1,
        )
    );
    $actions->add(
        new InviteAction(
            email: $signerEmail,
            roleName: $signerRole,
            action: 'sign',
            documentId: $documentId2,
        )
    );

    $emails = new InviteEmailCollection();
    $emails->add(
        new InviteEmail(
            $signerEmail,
            $subject,
            $message,
        )
    );

    $inviteSteps->add(
        new InviteStep(
            1,
            $actions,
            $emails,
        )
    );
    $cc = new CcCollection();   // configure carbon copies collection if needed

    $request = new GroupInvitePost($inviteSteps, $cc);
    $request->withDocumentGroupId($documentGroupId);

    /** @var GroupInvitePostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
