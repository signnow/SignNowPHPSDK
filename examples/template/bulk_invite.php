<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Template\Request\BulkInvitePost;
use SignNow\Api\Template\Response\BulkInvitePost as BulkInviteResponse;
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

    // source data
    $csvFilePath = $data->getBulkInviteCsvFilePath();
    $folderId = $data->getBulkInviteFolderId();
    $templateId = $data->getBulkInviteTemplateId();

    $request = new BulkInvitePost(
        file: new SplFileInfo($csvFilePath),
        folderId: $folderId,
        clientTimestamp: 0,
        documentName: 'test_bulk_invite',
        subject: 'bulk invite subject',
        emailMessage: 'bulk invite message',
    );
    $request->withDocumentId($templateId);

    /** @var BulkInviteResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
