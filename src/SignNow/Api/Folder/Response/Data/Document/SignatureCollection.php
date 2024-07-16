<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class SignatureCollection extends TypedCollection
{
    public function add(Signature $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Signature) {
            throw new InvalidArgumentException('Only Signature are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Signature::class;
    }
}
