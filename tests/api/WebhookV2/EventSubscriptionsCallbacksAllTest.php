<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\WebhookV2;

use SignNow\Api\WebhookV2\Request\EventSubscriptionsCallbacksAllGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class EventSubscriptionsCallbacksAllTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetEventSubscriptionsCallbacksAll();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetEventSubscriptionsCallbacksAll(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_all_event_subscriptions_callbacks_v2', 'get');
        $request = new EventSubscriptionsCallbacksAllGet();
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
