<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'deleteEventSubscription',
    url: '/api/v2/events/{event_subscription_id}',
    method: 'delete',
    auth: 'basic',
    namespace: 'webhook',
    entity: 'subscription',
    type: 'application/json',
)]
final class SubscriptionDelete implements RequestInterface
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
