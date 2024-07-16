<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\DocumentInvite\Request\FreeFormInvitePost;
use SignNow\Api\DocumentInvite\Response\FreeFormInvitePost as FreeFormInvitePostResponse;
use SignNow\ApiClient;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $senderEmail = 'sender@signnow.com';
    $signerEmail = 'signer@signnow.com';

    // 1. Upload a document
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';
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
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
