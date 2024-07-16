<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentInvite;

use SignNow\Api\DocumentInvite\Request\CancelFreeFormInvitePut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CancelFreeFormInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPutCancelFreeFormInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutCancelFreeFormInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('cancel_free_form_invite', 'put');
        $faker = $this->faker();

        $request = new CancelFreeFormInvitePut(
            $faker->reason()
        );
        $request->withInviteId($faker->inviteId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
    }
}
