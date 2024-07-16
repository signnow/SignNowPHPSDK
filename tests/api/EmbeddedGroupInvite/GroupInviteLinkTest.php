<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\EmbeddedGroupInvite;

use SignNow\Api\EmbeddedGroupInvite\Request\GroupInviteLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class GroupInviteLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostGroupInviteLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostGroupInviteLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_link_for_embedded_invite_document_group', 'post');
        $faker = $this->faker();

        $request = new GroupInviteLinkPost(
            $faker->email(),
            $faker->authMethod(),
            $faker->linkExpiration()
        );
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withEmbeddedInviteId($faker->embeddedInviteId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
