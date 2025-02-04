<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Sdk\Tests\EmbeddedGroupInvite;

use SignNow\Api\EmbeddedGroupInvite\Request\GroupInvitePost;
use SignNow\Api\EmbeddedGroupInvite\Request\GroupInviteDelete;
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
        $this->testDeleteGroupInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostGroupInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_embedded_invite_for_document_group', 'post');
        $faker = $this->faker();

        $request = new GroupInvitePost(
            $faker->embeddedGroupInviteGroupInviteInvites(),
            $faker->boolean()
        );
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testDeleteGroupInvite(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new GroupInviteDelete();
        $request->withDocumentGroupId($faker->documentGroupId());
        $response = $client->send($request);

        assert(is_object($response));
    }
}
