<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data\Tag;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class TagCollection extends TypedCollection
{
    public function add(Tag $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Tag) {
            throw new InvalidArgumentException('Only Tag are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Tag::class;
    }
}
