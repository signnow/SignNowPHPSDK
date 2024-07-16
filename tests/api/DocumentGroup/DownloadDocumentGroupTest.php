<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentGroup;

use SignNow\Api\DocumentGroup\Request\DownloadDocumentGroupPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DownloadDocumentGroupTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDownloadDocumentGroup();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDownloadDocumentGroup(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new DownloadDocumentGroupPost(
            $faker->type(),
            $faker->withHistory(),
            $faker->documentGroupDownloadDocumentGroupDocumentOrder()
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
    }
}
