<?php

declare(strict_types=1);

namespace SignNow\Api\SmartFields\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class DataCollection extends TypedCollection
{
    public function add(Data $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Data) {
            throw new InvalidArgumentException('Only Data are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Data::class;
    }
}
