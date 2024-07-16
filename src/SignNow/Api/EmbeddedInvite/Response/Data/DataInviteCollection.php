<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedInvite\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DataInviteCollection extends TypedCollection
{
    public function add(DataInvite $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof DataInvite) {
            throw new InvalidArgumentException('Only DataInvite are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return DataInvite::class;
    }
}
