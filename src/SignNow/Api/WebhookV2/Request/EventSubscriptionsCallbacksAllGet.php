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
    name: 'getAllEventSubscriptionsCallbacksV2',
    url: '/v2/event-subscriptions/callbacks',
    method: 'get',
    auth: 'bearer',
    namespace: 'webhookV2',
    entity: 'eventSubscriptionsCallbacksAll',
    type: 'application/json',
)]
final class EventSubscriptionsCallbacksAllGet implements RequestInterface
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
