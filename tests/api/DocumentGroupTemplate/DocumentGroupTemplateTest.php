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

namespace SignNow\Sdk\Tests\DocumentGroupTemplate;

use SignNow\Api\DocumentGroupTemplate\Request\DocumentGroupTemplatePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentGroupTemplateTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentGroupTemplate();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentGroupTemplate(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_group_from_template', 'post');
        $faker = $this->faker();

        $request = new DocumentGroupTemplatePost(
            $faker->groupName(),
            $faker->clientTimestamp(),
            $faker->folderId()
        );
        $request->withTemplateGroupId($faker->templateGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
    }
}
