<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * This example describes how to download a document group
 */

use SignNow\Api\DocumentGroup\Request\Data\DocumentOrderCollection;
use SignNow\Api\DocumentGroup\Request\DownloadDocumentGroupPost;
use SignNow\Api\DocumentGroup\Response\DownloadDocumentGroupPost as DocumentGroupPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    $documentGroupId = '9e1c3a6b8f5d47a09cde2fb7e8a10b1f4d6c3e8b';
    $request = new DownloadDocumentGroupPost('merged', 'no', new DocumentOrderCollection());
    $request->withDocumentGroupId($documentGroupId);

    /** @var DocumentGroupPostResponse $response */
    $response = $apiClient->send($request);
    echo $response->getFile()->getPathname();
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
