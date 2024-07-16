<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\FieldInvite;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class EmbeddedSignerCollection extends TypedCollection
{
    public function add(EmbeddedSigner $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof EmbeddedSigner) {
            throw new InvalidArgumentException('Only EmbeddedSigner are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return EmbeddedSigner::class;
    }
}
