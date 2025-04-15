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

namespace SignNow\Sdk\Tests\WebhookV2;

use SignNow\Api\WebhookV2\Request\CallbackGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CallbackTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetCallback();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetCallback(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new CallbackGet();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());

        $request->withCallbackId($faker->callbackId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
