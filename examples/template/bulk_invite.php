<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Template\Request\BulkInvitePost;
use SignNow\Api\Template\Response\BulkInvitePost as BulkInviteResponse;
use SignNow\ApiClient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    $csvFilePath = dirname(__DIR__) . '/_data/bulk_invite.csv'; // specify your CSV file path
    $folderId = 'YOUR_FOLDER_ID_HERE';                          // where to store the document
    $templateId = 'YOUR_TEMPLATE_ID_HERE';                      // template id to use for bulk invite

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
