<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

/**
 * This example describes how to download a document group
 */

use SignNow\Api\DocumentGroup\Request\Data\DocumentOrderCollection;
use SignNow\Api\DocumentGroup\Request\DownloadDocumentGroupPost;
use SignNow\Api\DocumentGroup\Response\DownloadDocumentGroupPost as DocumentGroupPostResponse;
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

    $documentGroupId = $data->getDownloadDocumentGroupDocumentGroupId();
    $request = new DownloadDocumentGroupPost('merged', 'no', new DocumentOrderCollection());
    $request->withDocumentGroupId($documentGroupId);

    /** @var DocumentGroupPostResponse $response */
    $response = $apiClient->send($request);
    echo $response->getFile()->getPathname();
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
