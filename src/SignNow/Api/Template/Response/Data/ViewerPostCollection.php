<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ViewerPostCollection extends TypedCollection
{
    public function add(ViewerPost $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ViewerPost) {
            throw new InvalidArgumentException('Only ViewerPost are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ViewerPost::class;
    }
}
