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

use SignNow\Api\WebhookV2\Request\CallbacksAllGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CallbacksAllTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetCallbacksAll();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetCallbacksAll(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new CallbacksAllGet();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
