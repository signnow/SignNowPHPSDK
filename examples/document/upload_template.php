<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\ApiClient;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // path to the document you want to upload to be used as a template in signNow
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';

    $request = new DocumentPost(
        new SplFileInfo($documentFile),
        name: 'template uploaded by signNow PHP SDK 3.0',
        makeTemplate: 1,
    );

    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
