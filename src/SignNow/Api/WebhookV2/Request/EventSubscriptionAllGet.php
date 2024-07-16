<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getEventSubscriptionsV2',
    url: '/v2/event-subscriptions',
    method: 'get',
    auth: 'bearer',
    namespace: 'webhookV2',
    entity: 'eventSubscriptionAll',
    type: 'application/json',
)]
final class EventSubscriptionAllGet implements RequestInterface
{
    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
