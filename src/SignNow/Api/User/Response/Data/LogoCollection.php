<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class LogoCollection extends TypedCollection
{
    public function add(Logo $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Logo) {
            throw new InvalidArgumentException('Only Logo are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Logo::class;
    }
}
