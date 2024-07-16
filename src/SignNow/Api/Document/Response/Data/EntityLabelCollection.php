<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class EntityLabelCollection extends TypedCollection
{
    public function add(EntityLabel $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof EntityLabel) {
            throw new InvalidArgumentException('Only EntityLabel are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return EntityLabel::class;
    }
}
