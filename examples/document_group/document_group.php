<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\DocumentGroup\Request\Data\DocumentIdCollection;
use SignNow\Api\DocumentGroup\Request\DocumentGroupGet;
use SignNow\Api\DocumentGroup\Request\DocumentGroupPost;
use SignNow\Api\DocumentGroup\Response\DocumentGroupGet as DocumentGroupGetResponse;
use SignNow\Api\DocumentGroup\Response\DocumentGroupPost as DocumentGroupPostResponse;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to create a document group from two documents
 * and then get the created document group
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // Upload 1st document
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId1 = $response->getId();

    // Upload 2nd document
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId2 = $response->getId();

    // Create document group
    $groupName = 'Test Document Group';
    $request = new DocumentGroupPost(
        new DocumentIdCollection([$documentId1, $documentId2]),
        $groupName,
    );

    /** @var DocumentGroupPostResponse $response */
    $response = $apiClient->send($request);
    $groupId = $response->getId();

    // Finally, get just created document group
    $request = new DocumentGroupGet();
    $request->withDocumentGroupId($groupId);

    /** @var DocumentGroupGetResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
