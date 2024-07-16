<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class FieldValidatorCollection extends TypedCollection
{
    public function add(FieldValidator $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof FieldValidator) {
            throw new InvalidArgumentException('Only FieldValidator are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return FieldValidator::class;
    }
}
