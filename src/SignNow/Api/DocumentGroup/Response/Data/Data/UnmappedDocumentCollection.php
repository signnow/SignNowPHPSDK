<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class UnmappedDocumentCollection extends TypedCollection
{
    public function add(UnmappedDocument $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof UnmappedDocument) {
            throw new InvalidArgumentException('Only UnmappedDocument are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return UnmappedDocument::class;
    }
}
