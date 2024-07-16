<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Response;

use SignNow\Api\Webhook\Response\Data\Data\DataSubscriptionCollection;

readonly class SubscriptionGet
{
    public function __construct(
        private DataSubscriptionCollection $data,
    ) {
    }

    public function getData(): DataSubscriptionCollection
    {
        return $this->data;
    }
}
