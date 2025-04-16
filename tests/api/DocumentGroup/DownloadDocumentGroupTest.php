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

namespace SignNow\Sdk\Tests\DocumentGroup;

use SignNow\Api\DocumentGroup\Request\DownloadDocumentGroupPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DownloadDocumentGroupTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDownloadDocumentGroup();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDownloadDocumentGroup(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new DownloadDocumentGroupPost(
            $faker->type(),
            $faker->withHistory(),
            $faker->documentGroupDownloadDocumentGroupDocumentOrder()
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
