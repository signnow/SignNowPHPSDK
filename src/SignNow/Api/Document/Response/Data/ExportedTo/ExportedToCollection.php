<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ExportedTo;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ExportedToCollection extends TypedCollection
{
    public function add(ExportedTo $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ExportedTo) {
            throw new InvalidArgumentException('Only ExportedTo are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ExportedTo::class;
    }
}
