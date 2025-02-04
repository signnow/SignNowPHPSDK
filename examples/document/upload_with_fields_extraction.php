<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Document\Request\Data\Tag\EnumerationOptionCollection;
use SignNow\Api\Document\Request\Data\Tag\Radio;
use SignNow\Api\Document\Request\Data\Tag\RadioCollection;
use SignNow\Api\Document\Request\Data\Tag\Tag;
use SignNow\Api\Document\Request\Data\Tag\TagCollection;
use SignNow\Api\Document\Request\FieldExtractPost;
use SignNow\Api\Document\Response\FieldExtractPost as FieldExtractPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to upload a document that contains complex text tags parsed.
 *
 * You can consider text tags as a placeholder for the fields you want to add to the document.
 * There are two kinds of text tags: simple text tags and complex text tags.
 *
 * To read more:
 * @link https://blog.signnow.com/signnow-api-simple-text-tags/
 * @link https://docs.signnow.com/docs/signnow/features#text-tags
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // path to the document you want to upload with tags parsed
    $documentFile = dirname(__DIR__) . '/_data/demo_tags.pdf';

    // As we have complex text tags in '{{APP_DIR}}/examples/_data/demo_tags.pdf'
    // we can customize further added fields
    // one by one
    $tags = new TagCollection();

    // first tag represents a text field
    $textTag = new Tag(
        type: 'text',
        x: 130,
        y: 100,
        pageNumber: 0,
        role: 'HR',
        required: true,
        width: 100,
        height: 16,
        tagName: 'Country',
        name: 'country_text',
    );
    // second tag represents a radio button group
    $radioGroup = new RadioCollection();
    $radioGroup->add(
        new Radio(
            pageNumber: 0,
            x:130,
            y: 200,
            width:  12,
            height:  12,
            checked:  "0",
            value: "yes",
            xOffset: 20,
            yOffset: 1
        )
    );
    $radioGroup->add(
        new Radio(
            pageNumber: 0,
            x:130,
            y: 200,
            width:  12,
            height:  12,
            checked:  "0",
            value: "no",
            xOffset: 81,
            yOffset: 1
        )
    );
    $radioTag = new Tag(
        type: 'radiobutton',
        x: 130,
        y: 200,
        pageNumber: 0,
        role: 'HR',
        required: true,
        width: 140,
        height: 20,
        tagName: 'Consent',
        name: 'consent_radio_group',
        radio: $radioGroup
    );

    // third tag represents a date field
    $dateTag = new Tag(
        type: 'text',
        x: 130,
        y: 300,
        pageNumber: 0,
        role: 'HR',
        required: true,
        width: 200,
        height: 20,
        tagName: 'DateSigned',
        name: 'date_signed_text',
        validatorId: '13435fa6c2a17f83177fcbb5c4a9376ce85befeb',
    );

    // the last tag is a dropdown (enumeration) field
    $dropdownTag = new Tag(
        type: 'enumeration',
        x: 130,
        y: 400,
        pageNumber: 0,
        role: 'HR',
        required: true,
        width: 200,
        height: 20,
        tagName: 'Drinks',
        name: 'drinks_enumeration',
        enumerationOptions: new EnumerationOptionCollection(
            [
                'Coffee',
                'Tea',
                'Soda',
            ]
        )
    );

    $tags->add($textTag);
    $tags->add($radioTag);
    $tags->add($dateTag);
    $tags->add($dropdownTag);

    $request = new FieldExtractPost(
        new SplFileInfo($documentFile),
        $tags,
    );

    /** @var FieldExtractPostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
