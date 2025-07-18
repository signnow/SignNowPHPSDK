<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\DocumentGroupTemplate\Request\DocumentGroupTemplatePost;
use SignNow\Api\DocumentGroupTemplate\Response\DocumentGroupTemplatePost as DocumentGroupTemplatePostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example demonstrates how to create a document group from a template.
 *
 * In this example, we will create a document group from an existing template.
 * You can get the template group ID from the response of the template creation request ../template/create_template.php
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $templateGroupId = 'YOUR_TEMPLATE_GROUP_ID_HERE';

    $request = new DocumentGroupTemplatePost(
        groupName: 'Test Document Group from Template',
        clientTimestamp: null, // optional parameter
        folderId: null, // optional parameter
    );

    $request->withTemplateGroupId($templateGroupId);

    /** @var DocumentGroupTemplatePostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
