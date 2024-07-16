<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentGroupInvite;

use SignNow\Api\DocumentGroupInvite\Request\GroupInvitePost;
use SignNow\Api\DocumentGroupInvite\Request\GroupInviteGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class GroupInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostGroupInvite();
        $this->testGetGroupInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostGroupInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('invite_to_sign_document_group', 'post');
        $faker = $this->faker();

        $request = new GroupInvitePost(
            $faker->documentGroupInviteGroupInviteInviteSteps(),
            $faker->documentGroupInviteGroupInviteCc(),
            $faker->documentGroupInviteGroupInviteEmailGroups(),
            $faker->documentGroupInviteGroupInviteCompletionEmails(),
            $faker->boolean(),
            $faker->clientTimestamp(false),
            $faker->ccSubject(),
            $faker->ccMessage()
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getPendingInviteLink()));
        assert($expectation->getPendingInviteLink() === $response->getPendingInviteLink());
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetGroupInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_document_group_invite', 'get');
        $faker = $this->faker();

        $request = new GroupInviteGet();
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withInviteId($faker->inviteId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getInvite()));
        assert($expectation->getInvite() === $response->getInvite()->toArray());
    }
}
