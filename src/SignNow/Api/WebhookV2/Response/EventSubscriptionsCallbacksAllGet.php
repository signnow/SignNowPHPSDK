<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Response;

use SignNow\Api\WebhookV2\Response\Data\Data\DataCollection;

readonly class EventSubscriptionsCallbacksAllGet
{
    public function __construct(
        private DataCollection $data = new DataCollection(),
    ) {
    }

    public function getData(): DataCollection
    {
        return $this->data;
    }
}
