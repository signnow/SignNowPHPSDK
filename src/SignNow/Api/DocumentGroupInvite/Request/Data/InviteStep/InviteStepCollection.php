<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class InviteStepCollection extends TypedCollection
{
    public function add(InviteStep $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof InviteStep) {
            throw new InvalidArgumentException('Only InviteStep are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return InviteStep::class;
    }
}
