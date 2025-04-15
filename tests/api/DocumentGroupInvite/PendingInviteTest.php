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

use SignNow\Api\DocumentGroupInvite\Request\PendingInviteGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class PendingInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetPendingInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetPendingInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_pending_document_group_invites', 'get');
        $faker = $this->faker();

        $request = new PendingInviteGet();
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withInviteId($faker->inviteId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_array($response->getInvites()->toArray()));
        $this->assertTrue($expectation->getInvites() === $response->getInvites()->toArray());
        $this->assertTrue(is_string($response->getDocumentGroupName()));
        $this->assertTrue($expectation->getDocumentGroupName() === $response->getDocumentGroupName());
        $this->assertTrue(is_bool($response->isSignAsMerged()));
        $this->assertTrue($expectation->isSignAsMerged() === $response->isSignAsMerged());
    }
}
