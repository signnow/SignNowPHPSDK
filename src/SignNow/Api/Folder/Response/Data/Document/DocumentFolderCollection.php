<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DocumentFolderCollection extends TypedCollection
{
    public function add(DocumentFolder $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof DocumentFolder) {
            throw new InvalidArgumentException('Only DocumentFolder are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return DocumentFolder::class;
    }
}
