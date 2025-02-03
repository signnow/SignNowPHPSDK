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

use SignNow\Api\WebhookV2\Request\EventSubscriptionAllGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class EventSubscriptionAllTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetEventSubscriptionAll();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetEventSubscriptionAll(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_event_subscriptions_v2', 'get');
        $request = new EventSubscriptionAllGet();
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
    }
}
