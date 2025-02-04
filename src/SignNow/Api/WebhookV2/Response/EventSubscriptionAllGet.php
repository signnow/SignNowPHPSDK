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

namespace SignNow\Api\WebhookV2\Response;

use SignNow\Api\WebhookV2\Response\Data\Data\DataEventSubscriptionCollection;

readonly class EventSubscriptionAllGet
{
    public function __construct(
        private DataEventSubscriptionCollection $data = new DataEventSubscriptionCollection(),
    ) {
    }

    public function getData(): DataEventSubscriptionCollection
    {
        return $this->data;
    }
}
