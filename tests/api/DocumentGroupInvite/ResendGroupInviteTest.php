<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentGroupInvite;

use SignNow\Api\DocumentGroupInvite\Request\ResendGroupInvitePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class ResendGroupInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostResendGroupInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostResendGroupInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('resend_document_group_invite', 'post');
        $faker = $this->faker();

        $request = new ResendGroupInvitePost(
            $faker->email()
        );
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withInviteId($faker->inviteId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
