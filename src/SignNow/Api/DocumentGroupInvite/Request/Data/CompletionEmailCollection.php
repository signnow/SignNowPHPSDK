<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class CompletionEmailCollection extends TypedCollection
{
    public function add(CompletionEmail $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof CompletionEmail) {
            throw new InvalidArgumentException('Only CompletionEmail are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return CompletionEmail::class;
    }
}
