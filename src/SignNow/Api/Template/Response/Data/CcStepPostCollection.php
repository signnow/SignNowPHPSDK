<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class CcStepPostCollection extends TypedCollection
{
    public function add(CcStepPost $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof CcStepPost) {
            throw new InvalidArgumentException('Only CcStepPost are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return CcStepPost::class;
    }
}
