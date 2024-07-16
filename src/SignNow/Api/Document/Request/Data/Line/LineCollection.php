<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data\Line;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class LineCollection extends TypedCollection
{
    public function add(Line $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Line) {
            throw new InvalidArgumentException('Only Line are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Line::class;
    }
}
