<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class OriginatorOrganizationSettingsCollection extends TypedCollection
{
    public function add(OriginatorOrganizationSettings $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof OriginatorOrganizationSettings) {
            throw new InvalidArgumentException('Only OriginatorOrganizationSettings are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return OriginatorOrganizationSettings::class;
    }
}
