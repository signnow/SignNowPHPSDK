<?php

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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getUserId()));
        assert($expectation->getUserId() === $response->getUserId());
        assert(is_string($response->getDocumentName()));
        assert($expectation->getDocumentName() === $response->getDocumentName());
        assert(is_string($response->getPageCount()));
        assert($expectation->getPageCount() === $response->getPageCount());
        assert(is_int($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
        assert(is_int($response->getUpdated()));
        assert($expectation->getUpdated() === $response->getUpdated());
        assert(is_string($response->getOriginalFilename()));
        assert($expectation->getOriginalFilename() === $response->getOriginalFilename());
        assert(is_string($response->getOriginUserId()));
        assert($expectation->getOriginUserId() === $response->getOriginUserId());
        assert(is_string($response->getOriginDocumentId()));
        assert($expectation->getOriginDocumentId() === $response->getOriginDocumentId());
        assert(is_string($response->getOwner()));
        assert($expectation->getOwner() === $response->getOwner());
        assert(is_string($response->getOwnerName()));
        assert($expectation->getOwnerName() === $response->getOwnerName());
        assert(is_bool($response->isTemplate()));
        assert($expectation->isTemplate() === $response->isTemplate());
        assert(is_string($response->getParentId()));
        assert($expectation->getParentId() === $response->getParentId());
        assert(is_string($response->getRecentlyUsed()));
        assert($expectation->getRecentlyUsed() === $response->getRecentlyUsed());
        assert(is_string($response->getOriginatorLogo()));
        assert($expectation->getOriginatorLogo() === $response->getOriginatorLogo());
        assert(is_array($response->getPages()));
        assert($expectation->getPages() === $response->getPages()->toArray());
        assert(is_string($response->getDefaultFolder()));
        assert($expectation->getDefaultFolder() === $response->getDefaultFolder());
        assert(is_array($response->getEntityLabels()));
        assert($expectation->getEntityLabels() === $response->getEntityLabels()->toArray());
        assert(is_int($response->getVersionTime()));
        assert($expectation->getVersionTime() === $response->getVersionTime());
        assert(is_array($response->getRoutingDetails()));
        assert($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
        assert(is_object($response->getThumbnail()));
        assert($expectation->getThumbnail() === $response->getThumbnail()->toArray());
        assert(is_array($response->getSignatures()));
        assert($expectation->getSignatures() === $response->getSignatures()->toArray());
        assert(is_array($response->getTags()));
        assert($expectation->getTags() === $response->getTags()->toArray());
        assert(is_array($response->getFields()));
        assert($expectation->getFields() === $response->getFields()->toArray());
        assert(is_array($response->getRoles()));
        assert($expectation->getRoles() === $response->getRoles()->toArray());
        assert(is_array($response->getViewerRoles()));
        assert($expectation->getViewerRoles() === $response->getViewerRoles()->toArray());
        assert(is_array($response->getFieldInvites()));
        assert($expectation->getFieldInvites() === $response->getFieldInvites()->toArray());
        assert(is_array($response->getViewerFieldInvites()));
        assert($expectation->getViewerFieldInvites() === $response->getViewerFieldInvites()->toArray());
        assert(is_object($response->getSigningSessionSettings()));
        assert($expectation->getSigningSessionSettings() === $response->getSigningSessionSettings()->toArray());
        assert(is_array($response->getEnumerationOptions()));
        assert($expectation->getEnumerationOptions() === $response->getEnumerationOptions()->toArray());
        assert(is_array($response->getPayments()));
        assert($expectation->getPayments() === $response->getPayments()->toArray());
        assert(is_array($response->getIntegrations()));
        assert($expectation->getIntegrations() === $response->getIntegrations()->toArray());
        assert(is_array($response->getIntegrationObjects()));
        assert($expectation->getIntegrationObjects() === $response->getIntegrationObjects()->toArray());
        assert(is_array($response->getExportedTo()));
        assert($expectation->getExportedTo() === $response->getExportedTo()->toArray());
        assert(is_array($response->getRadiobuttons()));
        assert($expectation->getRadiobuttons() === $response->getRadiobuttons()->toArray());
        assert(is_array($response->getSeals()));
        assert($expectation->getSeals() === $response->getSeals()->toArray());
        assert(is_array($response->getChecks()));
        assert($expectation->getChecks() === $response->getChecks()->toArray());
        assert(is_array($response->getTexts()));
        assert($expectation->getTexts() === $response->getTexts()->toArray());
        assert(is_array($response->getLines()));
        assert($expectation->getLines() === $response->getLines()->toArray());
        assert(is_array($response->getAttachments()));
        assert($expectation->getAttachments() === $response->getAttachments()->toArray());
        assert(is_array($response->getHyperlinks()));
        assert($expectation->getHyperlinks() === $response->getHyperlinks()->toArray());
        assert(is_array($response->getRequests()));
        assert($expectation->getRequests() === $response->getRequests()->toArray());
        assert(is_array($response->getInserts()));
        assert($expectation->getInserts() === $response->getInserts()->toArray());
        assert(is_array($response->getFieldsData()));
        assert($expectation->getFieldsData() === $response->getFieldsData()->toArray());
        assert(is_array($response->getFieldValidators()));
        assert($expectation->getFieldValidators() === $response->getFieldValidators()->toArray());
        assert(is_array($response->getOriginatorOrganizationSettings()));
        assert($expectation->getOriginatorOrganizationSettings() === $response->getOriginatorOrganizationSettings()->toArray());
        assert(is_object($response->getDocumentGroupInfo()));
        assert($expectation->getDocumentGroupInfo() === $response->getDocumentGroupInfo()->toArray());
        assert(is_array($response->getDocumentGroupTemplateInfo()));
        assert($expectation->getDocumentGroupTemplateInfo() === $response->getDocumentGroupTemplateInfo()->toArray());
        assert(is_object($response->getSettings()));
        assert($expectation->getSettings() === $response->getSettings()->toArray());
        assert(is_object($response->getShareInfo()));
        assert($expectation->getShareInfo() === $response->getShareInfo()->toArray());
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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
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

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
