<?php

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
        $expectation = $this->expectation('get_event_subscription_callback', 'get');
        $faker = $this->faker();

        $request = new CallbackGet();
        $request->withEventSubscriptionId($faker->eventSubscriptionId());

        $request->withCallbackId($faker->callbackId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
