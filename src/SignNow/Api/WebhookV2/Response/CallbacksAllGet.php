<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Response;

use SignNow\Api\WebhookV2\Response\Data\Data;

readonly class CallbacksAllGet
{
    public function __construct(
        private ?Data $data = null,
    ) {
    }

    public function getData(): ?Data
    {
        return $this->data;
    }
}
