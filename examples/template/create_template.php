<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Template\Request\TemplatePost;
use SignNow\Api\Template\Response\TemplatePost as TemplatePostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example demonstrates how to create a template from an existing document.
 *
 * In this example, we will create a template from an existing document.
 * You can get the document ID from the response of the document creation request ../document/upload.php
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $documentId = 'YOUR_DOCUMENT_ID_HERE';

    $request = new TemplatePost(
        documentId: $documentId,
        documentName: 'test_sdk_template',
    );

    /** @var TemplatePostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
