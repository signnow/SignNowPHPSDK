<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RecipientCollection extends TypedCollection
{
    public function add(Recipient $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Recipient) {
            throw new InvalidArgumentException('Only Recipient are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Recipient::class;
    }
}
