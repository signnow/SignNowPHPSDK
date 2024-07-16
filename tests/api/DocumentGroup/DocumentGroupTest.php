<?php

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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getGroupName()));
        assert($expectation->getGroupName() === $response->getGroupName());
        assert(is_string($response->getInviteId()));
        assert($expectation->getInviteId() === $response->getInviteId());
        assert(is_array($response->getDocuments()));
        assert($expectation->getDocuments() === $response->getDocuments()->toArray());
        assert(is_array($response->getOriginatorOrganizationSettings()));
        assert($expectation->getOriginatorOrganizationSettings() === $response->getOriginatorOrganizationSettings()->toArray());
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

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
