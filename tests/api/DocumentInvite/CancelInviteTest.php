<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentInvite;

use SignNow\Api\DocumentInvite\Request\CancelInvitePut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CancelInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPutCancelInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutCancelInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('cancel_invite', 'put');
        $faker = $this->faker();

        $request = new CancelInvitePut(
            $faker->reason()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
