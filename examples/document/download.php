<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Document\Request\DocumentDownloadGet;
use SignNow\Api\Document\Response\DocumentDownloadGet as DocumentDownloadGetResponse;
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

    // Prepare a request to download a document by id
    $documentId = $data->getDocumentId();
    $request = new DocumentDownloadGet();
    $request->withDocumentId($documentId)
        ->withType('collapsed')
        ->withHistory('no');

    /** @var DocumentDownloadGetResponse $response */
    $response = $apiClient->send($request);

    /** @var SplFileInfo $file */
    $downloadedFile = $response->getFile();
    echo $downloadedFile->getPathname() . PHP_EOL;
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}

