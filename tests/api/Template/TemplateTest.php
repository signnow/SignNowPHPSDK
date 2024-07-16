<?php

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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
    }
}
