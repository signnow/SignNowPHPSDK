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

use SignNow\Api\DocumentGroup\Request\DocumentGroupPost;
use SignNow\Api\DocumentGroup\Request\DocumentGroupGet;
use SignNow\Api\DocumentGroup\Request\DocumentGroupDelete;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentGroupTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentGroup();
        $this->testGetDocumentGroup();
        $this->testDeleteDocumentGroup();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentGroup(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_group', 'post');
        $faker = $this->faker();

        $request = new DocumentGroupPost(
            $faker->documentGroupDocumentIds(),
            $faker->groupName()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetDocumentGroup(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_group', 'get');
        $faker = $this->faker();

        $request = new DocumentGroupGet();
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getGroupName()));
        $this->assertTrue($expectation->getGroupName() === $response->getGroupName());
        $this->assertTrue(is_array($response->getDocuments()->toArray()));
        $this->assertTrue($expectation->getDocuments() === $response->getDocuments()->toArray());
        $this->assertTrue(is_array($response->getOriginatorOrganizationSettings()->toArray()));
        $this->assertTrue($expectation->getOriginatorOrganizationSettings() === $response->getOriginatorOrganizationSettings()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testDeleteDocumentGroup(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('delete_document_group', 'delete');
        $faker = $this->faker();

        $request = new DocumentGroupDelete();
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getStatus()));
        $this->assertTrue($expectation->getStatus() === $response->getStatus());
    }
}
