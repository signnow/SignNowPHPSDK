<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ActiveLogoCollection extends TypedCollection
{
    public function add(ActiveLogo $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ActiveLogo) {
            throw new InvalidArgumentException('Only ActiveLogo are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ActiveLogo::class;
    }
}
