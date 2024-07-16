<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data\Tag;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RadioCollection extends TypedCollection
{
    public function add(Radio $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Radio) {
            throw new InvalidArgumentException('Only Radio are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Radio::class;
    }
}
