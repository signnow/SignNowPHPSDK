<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RoutingDetailGetCollection extends TypedCollection
{
    public function add(RoutingDetailGet $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof RoutingDetailGet) {
            throw new InvalidArgumentException('Only RoutingDetailGet are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return RoutingDetailGet::class;
    }
}
