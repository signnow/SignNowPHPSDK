<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getEventSubscriptions',
    url: '/api/v2/events',
    method: 'get',
    auth: 'basic',
    namespace: 'webhook',
    entity: 'subscription',
    type: 'application/json',
)]
final class SubscriptionGet implements RequestInterface
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
