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

namespace SignNow\Sdk\Tests\Webhook;

use SignNow\Api\Webhook\Request\SubscriptionPost;
use SignNow\Api\Webhook\Request\SubscriptionGet;
use SignNow\Api\Webhook\Request\SubscriptionPut;
use SignNow\Api\Webhook\Request\SubscriptionDelete;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class SubscriptionTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostSubscription();
        $this->testGetSubscription();
        $this->testPutSubscription();
        $this->testDeleteSubscription();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostSubscription(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new SubscriptionPost(
            $faker->event(),
            $faker->entityId(),
            $faker->action(),
            $faker->webhookSubscriptionAttributes(),
            $faker->secretKey()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetSubscription(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_event_subscriptions', 'get');
        $request = new SubscriptionGet();
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_array($response->getData()->toArray()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutSubscription(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new SubscriptionPut(
            $faker->event(),
            $faker->entityId(),
            $faker->action(),
            $faker->webhookSubscriptionAttributes()
        );
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }

    /**
     * @throws SignNowApiException
     */
    public function testDeleteSubscription(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new SubscriptionDelete();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
    }
}
