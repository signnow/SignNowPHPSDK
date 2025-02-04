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

use SignNow\Api\WebhookV2\Request\EventSubscriptionGet;
use SignNow\Api\WebhookV2\Request\EventSubscriptionPut;
use SignNow\Api\WebhookV2\Request\EventSubscriptionDelete;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class EventSubscriptionTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetEventSubscription();
        $this->testPutEventSubscription();
        $this->testDeleteEventSubscription();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetEventSubscription(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_event_subscription_v2', 'get');
        $faker = $this->faker();

        $request = new EventSubscriptionGet();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutEventSubscription(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new EventSubscriptionPut(
            $faker->event(),
            $faker->entityId(),
            $faker->action(),
            $faker->webhookV2EventSubscriptionAttributes()
        );
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        assert(is_object($response));
    }

    /**
     * @throws SignNowApiException
     */
    public function testDeleteEventSubscription(): void
    {
        $client = $this->client();
        $faker = $this->faker();

        $request = new EventSubscriptionDelete();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        assert(is_object($response));
    }
}
