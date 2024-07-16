<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\FieldInvite;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DeclinedCollection extends TypedCollection
{
    public function add(Declined $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Declined) {
            throw new InvalidArgumentException('Only Declined are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Declined::class;
    }
}
