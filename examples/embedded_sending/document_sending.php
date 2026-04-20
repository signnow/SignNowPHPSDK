<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\EmbeddedSending\Request\DocumentEmbeddedSendingLinkPost;
use SignNow\Api\EmbeddedSending\Response\DocumentEmbeddedSendingLinkPost as DocumentEmbeddedSendingLinkPostResponse;
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

    /**
     * Specify the path to the file you want to upload.
     */
    $documentFile = $data->getPathToDocument();

    /**
     * Upload the file from the specified path.
     */
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );

    /** @var DocumentPostResponse $response */
    $documentResponse = $apiClient->send($request);

    /**
     * Create an embedded sending link for the uploaded document.
     */
    $embeddedSendingRequest = (new DocumentEmbeddedSendingLinkPost(
        type: 'invite',
        redirectUri: 'https://example.com',
        linkExpiration: 15,
        redirectTarget: 'self'
    ))->withDocumentId($documentResponse->getId());

    /** @var DocumentEmbeddedSendingLinkPostResponse $embeddedSendingResponse */
    $embeddedSendingResponse = $apiClient->send($embeddedSendingRequest);

    /**
     * A link for the document that leads to the Editor page
     * (or to the Send page if the `type` field is set to `invite`)
     */
    echo $embeddedSendingResponse->getData()->getUrl();
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
