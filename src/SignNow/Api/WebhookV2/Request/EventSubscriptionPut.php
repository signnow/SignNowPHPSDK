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

use SignNow\Api\WebhookV2\Request\Data\Attribute;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateEventSubscriptionsSubscriptionV2',
    url: '/v2/event-subscriptions/{event_subscription_id}',
    method: 'put',
    auth: 'bearer',
    namespace: 'webhookV2',
    entity: 'eventSubscription',
    type: 'application/json',
)]
final class EventSubscriptionPut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $event,
        private string $entityId,
        private string $action,
        private Attribute $attributes,
    ) {
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getEntityId(): string
    {
        return $this->entityId;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getAttributes(): Attribute
    {
        return $this->attributes;
    }

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
           'event' => $this->getEvent(),
           'entity_id' => $this->getEntityId(),
           'action' => $this->getAction(),
           'attributes' => $this->getAttributes()->toArray(),
        ];
    }
}
