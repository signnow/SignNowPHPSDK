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

use SignNow\Api\User\Request\EmailVerifyPut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class EmailVerifyTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPutEmailVerify();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutEmailVerify(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new EmailVerifyPut(
            $faker->email(),
            $faker->verificationToken()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
