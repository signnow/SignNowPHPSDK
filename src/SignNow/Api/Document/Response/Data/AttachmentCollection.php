<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class AttachmentCollection extends TypedCollection
{
    public function add(Attachment $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Attachment) {
            throw new InvalidArgumentException('Only Attachment are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Attachment::class;
    }
}
