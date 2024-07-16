<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class OrganizationSettingsCollection extends TypedCollection
{
    public function add(OrganizationSettings $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof OrganizationSettings) {
            throw new InvalidArgumentException('Only OrganizationSettings are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return OrganizationSettings::class;
    }
}
