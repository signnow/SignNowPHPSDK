<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ViewerFieldInvite;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ViewerFieldInviteCollection extends TypedCollection
{
    public function add(ViewerFieldInvite $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ViewerFieldInvite) {
            throw new InvalidArgumentException('Only ViewerFieldInvite are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ViewerFieldInvite::class;
    }
}
