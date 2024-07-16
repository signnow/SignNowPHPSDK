<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ApproverPostCollection extends TypedCollection
{
    public function add(ApproverPost $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ApproverPost) {
            throw new InvalidArgumentException('Only ApproverPost are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ApproverPost::class;
    }
}
