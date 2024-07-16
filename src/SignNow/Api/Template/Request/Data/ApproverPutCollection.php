<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ApproverPutCollection extends TypedCollection
{
    public function add(ApproverPut $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ApproverPut) {
            throw new InvalidArgumentException('Only ApproverPut are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ApproverPut::class;
    }
}
