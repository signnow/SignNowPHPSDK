<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\DocumentGroup\Request\Data\DocumentIdCollection;
use SignNow\Api\DocumentGroup\Request\DocumentGroupPost;
use SignNow\Api\DocumentGroup\Response\DocumentGroupPost as DocumentGroupPostResponse;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\EmbeddedSending\Request\DocumentGroupEmbeddedSendingLinkPost;
use SignNow\Api\EmbeddedSending\Response\DocumentGroupEmbeddedSendingLinkPost as DocumentGroupEmbeddedSendingLinkPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    /**
     * Upload documents to create a document group,
     * specify the paths to the files.
     */
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );

    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId1 = $response->getId();

    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );

    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId2 = $response->getId();

    /**
     * Create a document group by specifying its name
     * and the IDs of the documents it will consist of.
     */
    $groupName = 'Test Document Group';
    $request = new DocumentGroupPost(
        new DocumentIdCollection([$documentId1, $documentId2]),
        $groupName,
    );

    /** @var DocumentGroupPostResponse $response */
    $response = $apiClient->send($request);
    $groupId = $response->getId();

    /**
     * Create an embedded sending link for the created document group.
     */
    $embeddedSendingRequest = (new DocumentGroupEmbeddedSendingLinkPost(
        redirectUri: 'https://example.com',
        linkExpiration: 15,
        redirectTarget: 'self'
    ))->withDocumentGroupId($groupId);

    /** @var DocumentGroupEmbeddedSendingLinkPostResponse $embeddedSendingResponse */
    $embeddedSendingResponse = $apiClient->send($embeddedSendingRequest);

    /**
     * A link for the document group that leads to the Prepare page.
     */
    echo $embeddedSendingResponse->getData()->getUrl();
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
