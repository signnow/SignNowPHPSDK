<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DeactivateElementCollection extends TypedCollection
{
    public function add(DeactivateElement $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof DeactivateElement) {
            throw new InvalidArgumentException('Only DeactivateElement are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return DeactivateElement::class;
    }
}
