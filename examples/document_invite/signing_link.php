<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Document\Request\Data\Field;
use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Request\DocumentPut;
use SignNow\Api\Document\Response\DocumentPost as DocumentPostResponse;
use SignNow\Api\Document\Response\DocumentPut as DocumentPutResponse;
use SignNow\Api\DocumentInvite\Request\SigningLinkPost;
use SignNow\Api\DocumentInvite\Response\SigningLinkPost as SigningLinkResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // 1. Upload a document
    $documentFile = dirname(__DIR__) . '/_data/blank.pdf';
    $request = new DocumentPost(
        new SplFileInfo($documentFile),
    );
    /** @var DocumentPostResponse $response */
    $response = $apiClient->send($request);
    $documentId = $response->getId();

    // 2. Add fields and roles to the document
    $fields = new FieldCollection();
    $fields->add(
        new Field(
            x: 205,
            y: 18,
            width: 122,
            height: 12,
            type: 'text',
            pageNumber: 0,
            required: true,
            role: 'Manager',
            name: 'text_field',
            label: 'Decision reason',
        )
    );
    $request = new DocumentPut(
        fields: $fields,
    );
    $request->withDocumentId($documentId);
    /** @var DocumentPutResponse $response */
    $apiClient->send($request);

    // 3. Create a signing link
    $request = new SigningLinkPost($documentId);
    /** @var SigningLinkResponse $response */
    $response = $apiClient->send($request);

    echo 'Sign up link: ', $response->getUrl(), PHP_EOL;
    echo 'No sign up link: ', $response->getUrlNoSignup(), PHP_EOL;
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
