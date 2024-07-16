<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class FieldsDataCollection extends TypedCollection
{
    public function add(FieldsData $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof FieldsData) {
            throw new InvalidArgumentException('Only FieldsData are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return FieldsData::class;
    }
}
