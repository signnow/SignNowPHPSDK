<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RoutingDetailCollection extends TypedCollection
{
    public function add(RoutingDetail $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof RoutingDetail) {
            throw new InvalidArgumentException('Only RoutingDetail are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return RoutingDetail::class;
    }
}
