<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\EmbeddedEditor\Request\DocumentEmbeddedEditorLinkPost;
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

    // specify the path to the document you want to upload
    $documentFile = $data->getPathToDocument();

    // Create a document
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $documentResponse = $apiClient->send($request);

    // Create a link to embedded editor for the document
    $editorRequest = (new DocumentEmbeddedEditorLinkPost(
        redirectUri: 'https://example.com',
        redirectTarget: 'self',
        linkExpiration: 15,
    ))->withDocumentId($documentResponse->getId());
    $editorResponse = $apiClient->send($editorRequest);

    // the link to open the document in the embedded editor
    echo $editorResponse->getData()->getUrl();
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
