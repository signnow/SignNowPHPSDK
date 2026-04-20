<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
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

    // path to the document you want to upload to be used as a template in signNow
    $documentFile = $data->getPathToDocument();

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
