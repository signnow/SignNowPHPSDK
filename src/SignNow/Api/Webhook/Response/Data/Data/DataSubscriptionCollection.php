<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Response\Data\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DataSubscriptionCollection extends TypedCollection
{
    public function add(DataSubscription $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof DataSubscription) {
            throw new InvalidArgumentException('Only DataSubscription are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return DataSubscription::class;
    }
}
