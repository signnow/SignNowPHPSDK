<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DocumentCollection extends TypedCollection
{
    public function add(Document $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Document) {
            throw new InvalidArgumentException('Only Document are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Document::class;
    }
}
