<?php

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
