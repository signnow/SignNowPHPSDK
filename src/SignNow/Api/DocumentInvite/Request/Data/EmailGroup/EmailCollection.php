<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data\EmailGroup;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class EmailCollection extends TypedCollection
{
    public function add(Email $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Email) {
            throw new InvalidArgumentException('Only Email are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Email::class;
    }
}
