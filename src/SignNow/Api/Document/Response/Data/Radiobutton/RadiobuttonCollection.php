<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\Radiobutton;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RadiobuttonCollection extends TypedCollection
{
    public function add(Radiobutton $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Radiobutton) {
            throw new InvalidArgumentException('Only Radiobutton are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Radiobutton::class;
    }
}
