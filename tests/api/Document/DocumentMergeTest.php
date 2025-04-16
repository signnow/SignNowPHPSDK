<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Document;

use SignNow\Api\Document\Request\DocumentMergePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentMergeTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentMerge();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentMerge(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new DocumentMergePost(
            $faker->name(),
            $faker->documentDocumentMergeDocumentIds(),
            $faker->boolean()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
