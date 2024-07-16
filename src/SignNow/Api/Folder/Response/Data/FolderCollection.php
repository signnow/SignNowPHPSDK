<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class FolderCollection extends TypedCollection
{
    public function add(Folder $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Folder) {
            throw new InvalidArgumentException('Only Folder are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Folder::class;
    }
}
