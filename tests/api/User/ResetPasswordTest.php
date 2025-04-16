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

namespace SignNow\Sdk\Tests\User;

use SignNow\Api\User\Request\ResetPasswordPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class ResetPasswordTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostResetPassword();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostResetPassword(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('reset_password', 'post');
        $faker = $this->faker();

        $request = new ResetPasswordPost(
            $faker->email()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getStatus()));
        $this->assertTrue($expectation->getStatus() === $response->getStatus());
    }
}
