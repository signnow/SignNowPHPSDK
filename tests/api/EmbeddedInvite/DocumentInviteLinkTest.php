<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\EmbeddedInvite;

use SignNow\Api\EmbeddedInvite\Request\DocumentInviteLinkPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentInviteLinkTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentInviteLink();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentInviteLink(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_link_for_embedded_invite', 'post');
        $faker = $this->faker();

        $request = new DocumentInviteLinkPost(
            $faker->authMethod(),
            $faker->linkExpiration()
        );
        $request->withDocumentId($faker->documentId());

        $request->withFieldInviteId($faker->fieldInviteId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
