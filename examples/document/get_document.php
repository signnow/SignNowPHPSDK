<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Api\Document\Response\DocumentGet as DocumentGetResponse;
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

    // Prepare a request to get a document by id
    $documentId = $data->getDocumentId();

    $request = new DocumentGet();
    $request->withDocumentId($documentId);

    /** @var DocumentGetResponse $response */
    $response = $apiClient->send($request);

    $documentId = $response->getId();
    $documentName = $response->getDocumentName();
    // Optional fields (available when using ?include=field_invites query parameter)
    $generalExpirationDays = $response->getGeneralExpirationDays();
    $generalReminder = $response->getGeneralReminder();
    $orderType = $response->getOrderType();

    echo 'Document Id: ' . $documentId . PHP_EOL;
    echo 'Document name: ' . $documentName . PHP_EOL;
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
