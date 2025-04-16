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

use SignNow\Api\Template\Request\TemplatePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class TemplateTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostTemplate();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostTemplate(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_template', 'post');
        $faker = $this->faker();

        $request = new TemplatePost(
            $faker->documentId(),
            $faker->documentName()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
    }
}
