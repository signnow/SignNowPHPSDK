<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class SealCollection extends TypedCollection
{
    public function add(Seal $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Seal) {
            throw new InvalidArgumentException('Only Seal are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Seal::class;
    }
}
