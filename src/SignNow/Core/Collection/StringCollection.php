<?php

declare(strict_types=1);

namespace SignNow\Core\Collection;

use InvalidArgumentException;

class StringCollection extends TypedCollection
{
    public function add(string $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('Only strings are allowed in typed collection.');
        }
    }

    public function getItemType(): string
    {
        return 'string';
    }
}
