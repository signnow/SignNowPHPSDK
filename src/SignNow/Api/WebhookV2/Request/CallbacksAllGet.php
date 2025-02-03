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

namespace SignNow\Api\WebhookV2\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getEventSubscriptionCallbacksV2',
    url: '/v2/event-subscriptions/{event_subscription_id}/callbacks',
    method: 'get',
    auth: 'bearer',
    namespace: 'webhookV2',
    entity: 'callbacksAll',
    type: 'application/json',
)]
final class CallbacksAllGet implements RequestInterface
{
    private array $uriParams = [];


    public function withEventSubscriptionId(string $eventSubscriptionId): self
    {
        $this->uriParams['event_subscription_id'] = $eventSubscriptionId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
