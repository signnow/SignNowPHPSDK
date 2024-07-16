<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class HyperlinkCollection extends TypedCollection
{
    public function add(Hyperlink $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Hyperlink) {
            throw new InvalidArgumentException('Only Hyperlink are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Hyperlink::class;
    }
}
