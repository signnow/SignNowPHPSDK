<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DocumentGroupTemplateInfoCollection extends TypedCollection
{
    public function add(DocumentGroupTemplateInfo $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof DocumentGroupTemplateInfo) {
            throw new InvalidArgumentException('Only DocumentGroupTemplateInfo are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return DocumentGroupTemplateInfo::class;
    }
}
