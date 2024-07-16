<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class PageCollection extends TypedCollection
{
    public function add(Page $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Page) {
            throw new InvalidArgumentException('Only Page are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Page::class;
    }
}
