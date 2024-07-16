<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class TextCollection extends TypedCollection
{
    public function add(Text $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Text) {
            throw new InvalidArgumentException('Only Text are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Text::class;
    }
}
