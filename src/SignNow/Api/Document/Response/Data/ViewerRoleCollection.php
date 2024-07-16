<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ViewerRoleCollection extends TypedCollection
{
    public function add(ViewerRole $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ViewerRole) {
            throw new InvalidArgumentException('Only ViewerRole are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ViewerRole::class;
    }
}
