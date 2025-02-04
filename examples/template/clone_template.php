<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Template\Request\CloneTemplatePost;
use SignNow\Api\Template\Response\CloneTemplatePost as CloneTemplatePostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example demonstrates how to create a new document from an existing document template.
 *
 * You can get the template ID from the response of the template creation request ./create_template.php
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $templateId = 'YOUR_DOCUMENT_ID_HERE';

    $request = new CloneTemplatePost();
    $request->withTemplateId($templateId);

    /** @var CloneTemplatePostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
