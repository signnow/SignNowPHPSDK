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

use SignNow\Api\Template\Request\GroupTemplateGet;
use SignNow\Api\Template\Request\GroupTemplatePut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class GroupTemplateTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetGroupTemplate();
        $this->testPutGroupTemplate();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetGroupTemplate(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_group_template', 'get');
        $faker = $this->faker();

        $request = new GroupTemplateGet();
        $request->withTemplateId($faker->templateId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getUserId()));
        $this->assertTrue($expectation->getUserId() === $response->getUserId());
        $this->assertTrue(is_string($response->getGroupName()));
        $this->assertTrue($expectation->getGroupName() === $response->getGroupName());
        $this->assertTrue(is_string($response->getFolderId()));
        $this->assertTrue($expectation->getFolderId() === $response->getFolderId());
        $this->assertTrue(is_object($response->getRoutingDetails()));
        $this->assertTrue($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
        $this->assertTrue(is_array($response->getTemplates()->toArray()));
        $this->assertTrue($expectation->getTemplates() === $response->getTemplates()->toArray());
        $this->assertTrue(is_int($response->getShared()));
        $this->assertTrue($expectation->getShared() === $response->getShared());
        $this->assertTrue(is_string($response->getDocumentGroupTemplateOwnerEmail()));
        $this->assertTrue($expectation->getDocumentGroupTemplateOwnerEmail() === $response->getDocumentGroupTemplateOwnerEmail());
        $this->assertTrue(is_string($response->getSharedTeamId()));
        $this->assertTrue($expectation->getSharedTeamId() === $response->getSharedTeamId());
        $this->assertTrue(is_bool($response->isOwnAsMerged()));
        $this->assertTrue($expectation->isOwnAsMerged() === $response->isOwnAsMerged());
        $this->assertTrue(is_string($response->getEmailActionOnComplete()));
        $this->assertTrue($expectation->getEmailActionOnComplete() === $response->getEmailActionOnComplete());
        $this->assertTrue(is_int($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
        $this->assertTrue(is_int($response->getUpdated()));
        $this->assertTrue($expectation->getUpdated() === $response->getUpdated());
        $this->assertTrue(is_int($response->getRecentlyUsed()));
        $this->assertTrue($expectation->getRecentlyUsed() === $response->getRecentlyUsed());
        $this->assertTrue(is_bool($response->isPinned()));
        $this->assertTrue($expectation->isPinned() === $response->isPinned());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutGroupTemplate(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new GroupTemplatePut(
            $faker->templateGroupTemplateRoutingDetails(),
            $faker->templateGroupName(),
            $faker->templateGroupTemplateTemplateIdsToAdd(),
            $faker->templateGroupTemplateTemplateIdsToRemove()
        );
        $request->withTemplateId($faker->templateId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
