<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class InsertCollection extends TypedCollection
{
    public function add(Insert $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Insert) {
            throw new InvalidArgumentException('Only Insert are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Insert::class;
    }
}
