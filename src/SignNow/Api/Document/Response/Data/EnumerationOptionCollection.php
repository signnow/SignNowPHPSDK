<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class EnumerationOptionCollection extends TypedCollection
{
    public function add(EnumerationOption $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof EnumerationOption) {
            throw new InvalidArgumentException('Only EnumerationOption are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return EnumerationOption::class;
    }
}
