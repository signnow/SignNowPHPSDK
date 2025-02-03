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

namespace SignNow\Api\Webhook\Request;

use SignNow\Api\Webhook\Request\Data\Attribute;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createEventSubscription',
    url: '/api/v2/events',
    method: 'post',
    auth: 'bearer',
    namespace: 'webhook',
    entity: 'subscription',
    type: 'application/json',
)]
final class SubscriptionPost implements RequestInterface
{
    public function __construct(
        private string $event,
        private string $entityId,
        private string $action = '',
        private ?Attribute $attributes = null,
        private string $secretKey = '',
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

    public function getAttributes(): ?Attribute
    {
        return $this->attributes;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'event' => $this->getEvent(),
           'entity_id' => $this->getEntityId(),
           'action' => $this->getAction(),
           'attributes' => $this->getAttributes(),
           'secret_key' => $this->getSecretKey(),
        ];
    }
}
