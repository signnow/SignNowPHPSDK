<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class IntegrationCollection extends TypedCollection
{
    public function add(Integration $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Integration) {
            throw new InvalidArgumentException('Only Integration are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Integration::class;
    }
}
