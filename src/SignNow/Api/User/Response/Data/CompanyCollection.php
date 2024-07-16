<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class CompanyCollection extends TypedCollection
{
    public function add(Company $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Company) {
            throw new InvalidArgumentException('Only Company are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Company::class;
    }
}
