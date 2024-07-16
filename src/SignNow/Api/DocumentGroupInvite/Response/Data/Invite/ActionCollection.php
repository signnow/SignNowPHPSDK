<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response\Data\Invite;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ActionCollection extends TypedCollection
{
    public function add(Action $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Action) {
            throw new InvalidArgumentException('Only Action are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Action::class;
    }
}
