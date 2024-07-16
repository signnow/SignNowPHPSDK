<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ViewerCollection extends TypedCollection
{
    public function add(Viewer $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Viewer) {
            throw new InvalidArgumentException('Only Viewer are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Viewer::class;
    }
}
