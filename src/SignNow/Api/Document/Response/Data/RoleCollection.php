<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RoleCollection extends TypedCollection
{
    public function add(Role $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Role) {
            throw new InvalidArgumentException('Only Role are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Role::class;
    }
}
