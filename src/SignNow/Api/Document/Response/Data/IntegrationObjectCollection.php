<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class IntegrationObjectCollection extends TypedCollection
{
    public function add(IntegrationObject $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof IntegrationObject) {
            throw new InvalidArgumentException('Only IntegrationObject are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return IntegrationObject::class;
    }
}
