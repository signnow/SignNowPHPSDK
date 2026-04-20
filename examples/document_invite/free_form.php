<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\DocumentInvite\Request\CancelFreeFormInvitePut;
use SignNow\Api\DocumentInvite\Response\CancelFreeFormInvitePut as CancelFreeFormInvitePutResponse;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\DocumentInvite\Request\FreeFormInvitePost;
use SignNow\Api\DocumentInvite\Response\FreeFormInvitePost as FreeFormInvitePostResponse;
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
    $signerEmail = $data->getFreeFormInviteSignerEmail();

    // 1. Upload a document
    $documentFile = $data->getPathToDocument();
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId = $response->getId();

    // 2. Send a free form invite to sign the document
    $request = new FreeFormInvitePost(
        $signerEmail,
        $senderEmail,
    );
    $request->withDocumentId($documentId);
    /** @var FreeFormInvitePostResponse $response */
    $response = $apiClient->send($request);
    $inviteId = $response->getId();
    echo 'Free form invite sent successfully, ID: ' . $inviteId . PHP_EOL;

    // 3. Cancel the free form invite
    $request = new CancelFreeFormInvitePut(
        reason: 'Test cancel free form invite',
    );
    $request->withInviteId($inviteId);
    /** @var CancelFreeFormInvitePutResponse $response */
    $response = $apiClient->send($request);
    echo 'Free form invite canceled successfully' . PHP_EOL;
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
