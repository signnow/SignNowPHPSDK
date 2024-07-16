<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ViewerPutCollection extends TypedCollection
{
    public function add(ViewerPut $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ViewerPut) {
            throw new InvalidArgumentException('Only ViewerPut are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ViewerPut::class;
    }
}
