<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Template\Request\TemplatePost;
use SignNow\Api\Template\Response\TemplatePost as TemplatePostResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example demonstrates how to create a template from an existing document.
 *
 * In this example, we will create a template from an existing document.
 * You can get the document ID from the response of the document creation request ../document/upload.php
 */
try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();
    // document as a source to create a template
    $documentId = $data->getDocumentId();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
        ->getApiClient();

    $request = new TemplatePost(
        documentId: $documentId,
        documentName: 'test_sdk_template',
    );

    /** @var TemplatePostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
