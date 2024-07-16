<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class CcStepPutCollection extends TypedCollection
{
    public function add(CcStepPut $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof CcStepPut) {
            throw new InvalidArgumentException('Only CcStepPut are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return CcStepPut::class;
    }
}
