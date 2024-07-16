<?php

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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getName()));
        assert($expectation->getName() === $response->getName());
        assert(is_string($response->getFilename()));
        assert($expectation->getFilename() === $response->getFilename());
        assert(is_int($response->getPageCount()));
        assert($expectation->getPageCount() === $response->getPageCount());
        assert(is_int($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
        assert(is_int($response->getUpdated()));
        assert($expectation->getUpdated() === $response->getUpdated());
        assert(is_string($response->getEditorLink()));
        assert($expectation->getEditorLink() === $response->getEditorLink());
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

        assert(is_object($response));
    }
}
