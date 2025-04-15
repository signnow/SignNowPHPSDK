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

use SignNow\Api\DocumentGroupInvite\Request\CancelGroupInvitePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CancelGroupInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostCancelGroupInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostCancelGroupInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('cancel_document_group_invite', 'post');
        $faker = $this->faker();

        $request = new CancelGroupInvitePost();
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withInviteId($faker->inviteId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getStatus()));
        $this->assertTrue($expectation->getStatus() === $response->getStatus());
    }
}
