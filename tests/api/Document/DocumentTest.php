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

use SignNow\Api\Document\Request\DocumentPost;
use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Api\Document\Request\DocumentPut;
use SignNow\Api\Document\Request\DocumentDelete;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocument();
        $this->testGetDocument();
        $this->testPutDocument();
        $this->testDeleteDocument();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocument(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('upload_document', 'post');
        $faker = $this->faker();

        $request = new DocumentPost(
            $faker->file(),
            $faker->name(),
            $faker->boolean(),
            $faker->saveFields(),
            $faker->makeTemplate(),
            $faker->password(),
            $faker->folderId(),
            $faker->originTemplateId(),
            $faker->clientTimestamp(false)
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetDocument(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document', 'get');
        $faker = $this->faker();

        $request = new DocumentGet();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getUserId()));
        $this->assertTrue($expectation->getUserId() === $response->getUserId());
        $this->assertTrue(is_string($response->getDocumentName()));
        $this->assertTrue($expectation->getDocumentName() === $response->getDocumentName());
        $this->assertTrue(is_string($response->getPageCount()));
        $this->assertTrue($expectation->getPageCount() === $response->getPageCount());
        $this->assertTrue(is_int($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
        $this->assertTrue(is_int($response->getUpdated()));
        $this->assertTrue($expectation->getUpdated() === $response->getUpdated());
        $this->assertTrue(is_string($response->getOriginalFilename()));
        $this->assertTrue($expectation->getOriginalFilename() === $response->getOriginalFilename());
        $this->assertTrue(is_string($response->getOwner()));
        $this->assertTrue($expectation->getOwner() === $response->getOwner());
        $this->assertTrue(is_string($response->getOwnerName()));
        $this->assertTrue($expectation->getOwnerName() === $response->getOwnerName());
        $this->assertTrue(is_bool($response->isTemplate()));
        $this->assertTrue($expectation->isTemplate() === $response->isTemplate());
        $this->assertTrue(is_string($response->getParentId()));
        $this->assertTrue($expectation->getParentId() === $response->getParentId());
        $this->assertTrue(is_string($response->getOriginatorLogo()));
        $this->assertTrue($expectation->getOriginatorLogo() === $response->getOriginatorLogo());
        $this->assertTrue(is_array($response->getPages()->toArray()));
        $this->assertTrue($expectation->getPages() === $response->getPages()->toArray());
        $this->assertTrue(is_int($response->getVersionTime()));
        $this->assertTrue($expectation->getVersionTime() === $response->getVersionTime());
        $this->assertTrue(is_array($response->getRoutingDetails()->toArray()));
        $this->assertTrue($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
        $this->assertTrue(is_object($response->getThumbnail()));
        $this->assertTrue($expectation->getThumbnail() === $response->getThumbnail()->toArray());
        $this->assertTrue(is_array($response->getSignatures()->toArray()));
        $this->assertTrue($expectation->getSignatures() === $response->getSignatures()->toArray());
        $this->assertTrue(is_array($response->getTags()->toArray()));
        $this->assertTrue($expectation->getTags() === $response->getTags()->toArray());
        $this->assertTrue(is_array($response->getFields()->toArray()));
        $this->assertTrue($expectation->getFields() === $response->getFields()->toArray());
        $this->assertTrue(is_array($response->getRoles()->toArray()));
        $this->assertTrue($expectation->getRoles() === $response->getRoles()->toArray());
        $this->assertTrue(is_array($response->getViewerRoles()->toArray()));
        $this->assertTrue($expectation->getViewerRoles() === $response->getViewerRoles()->toArray());
        $this->assertTrue(is_object($response->getSigningSessionSettings()));
        $this->assertTrue($expectation->getSigningSessionSettings() === $response->getSigningSessionSettings()->toArray());
        $this->assertTrue(is_array($response->getOriginatorOrganizationSettings()->toArray()));
        $this->assertTrue($expectation->getOriginatorOrganizationSettings() === $response->getOriginatorOrganizationSettings()->toArray());
        $this->assertTrue(is_object($response->getDocumentGroupInfo()));
        $this->assertTrue($expectation->getDocumentGroupInfo() === $response->getDocumentGroupInfo()->toArray());
        $this->assertTrue(is_object($response->getSettings()));
        $this->assertTrue($expectation->getSettings() === $response->getSettings()->toArray());
        $this->assertTrue(is_object($response->getShareInfo()));
        $this->assertTrue($expectation->getShareInfo() === $response->getShareInfo()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutDocument(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('update_document', 'put');
        $faker = $this->faker();

        $request = new DocumentPut(
            $faker->documentFields(),
            $faker->documentLines(),
            $faker->documentChecks(),
            $faker->documentRadiobuttons(),
            $faker->documentSignatures(),
            $faker->documentTexts(),
            $faker->documentAttachments(),
            $faker->documentHyperlinks(),
            $faker->documentIntegrationObjects(),
            $faker->documentDeactivateElements(),
            $faker->documentName(),
            $faker->clientTimestamp()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
    }

    /**
     * @throws SignNowApiException
     */
    public function testDeleteDocument(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('delete_document', 'delete');
        $faker = $this->faker();

        $request = new DocumentDelete();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getStatus()));
        $this->assertTrue($expectation->getStatus() === $response->getStatus());
    }
}
