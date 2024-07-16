<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DomainCollection extends TypedCollection
{
    public function add(Domain $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Domain) {
            throw new InvalidArgumentException('Only Domain are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Domain::class;
    }
}
