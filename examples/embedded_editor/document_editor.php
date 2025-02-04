<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\EmbeddedEditor\Request\DocumentEmbeddedEditorLinkPost;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // specify the path to the document you want to upload
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';

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
