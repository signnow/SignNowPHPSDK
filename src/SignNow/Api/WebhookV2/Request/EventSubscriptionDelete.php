<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'deleteEventSubscriptionV2',
    url: '/v2/event-subscriptions/{event_subscription_id}',
    method: 'delete',
    auth: 'bearer',
    namespace: 'webhookV2',
    entity: 'eventSubscription',
    type: 'application/json',
)]
final class EventSubscriptionDelete implements RequestInterface
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
