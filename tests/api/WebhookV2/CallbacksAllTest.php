<?php

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
        $expectation = $this->expectation('get_event_subscription_callbacks_v2', 'get');
        $faker = $this->faker();

        $request = new CallbacksAllGet();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
