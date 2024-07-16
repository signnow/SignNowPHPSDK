<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ToCollection extends TypedCollection
{
    public function add(To $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof To) {
            throw new InvalidArgumentException('Only To are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return To::class;
    }
}
