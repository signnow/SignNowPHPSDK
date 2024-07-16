<?php

declare(strict_types=1);

namespace SignNow\Core\Collection;

use InvalidArgumentException;

class FloatCollection extends TypedCollection
{
    public function add(float $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!is_float($value)) {
            throw new InvalidArgumentException('Only floats are allowed in typed collection.');
        }
    }

    public function getItemType(): string
    {
        return 'float';
    }
}
