<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class CcStepCollection extends TypedCollection
{
    public function add(CcStep $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof CcStep) {
            throw new InvalidArgumentException('Only CcStep are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return CcStep::class;
    }
}
