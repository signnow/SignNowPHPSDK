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

namespace SignNow\Sdk\Tests\Template;

use SignNow\Api\Template\Request\CloneTemplatePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CloneTemplateTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostCloneTemplate();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostCloneTemplate(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_with_template', 'post');
        $faker = $this->faker();

        $request = new CloneTemplatePost(
            $faker->documentName(),
            $faker->clientTimestamp(),
            $faker->folderId()
        );
        $request->withTemplateId($faker->templateId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getName()));
        $this->assertTrue($expectation->getName() === $response->getName());
    }
}
