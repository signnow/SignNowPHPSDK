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

namespace SignNow\Sdk\Tests\DocumentGroupInvite;

use SignNow\Api\DocumentGroupInvite\Request\ReassignSignerPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class ReassignSignerTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostReassignSigner();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostReassignSigner(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('reassign_signer_for_document_group_invite', 'post');
        $faker = $this->faker();

        $request = new ReassignSignerPost(
            $faker->userToUpdate(),
            $faker->replaceWithThisUser(),
            $faker->documentGroupInviteReassignSignerInviteEmail(),
            $faker->documentGroupInviteReassignSignerUpdateInviteActionAttributes()
        );
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withInviteId($faker->inviteId());

        $request->withStepId($faker->stepId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
