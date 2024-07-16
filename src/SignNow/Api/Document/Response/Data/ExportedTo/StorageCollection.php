<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ExportedTo;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class StorageCollection extends TypedCollection
{
    public function add(Storage $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Storage) {
            throw new InvalidArgumentException('Only Storage are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Storage::class;
    }
}
