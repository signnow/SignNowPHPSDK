<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data\RoutingDetail;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class InviteActionCollection extends TypedCollection
{
    public function add(InviteAction $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof InviteAction) {
            throw new InvalidArgumentException('Only InviteAction are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return InviteAction::class;
    }
}
