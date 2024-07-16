<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class SubscriptionCollection extends TypedCollection
{
    public function add(Subscription $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Subscription) {
            throw new InvalidArgumentException('Only Subscription are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Subscription::class;
    }
}
