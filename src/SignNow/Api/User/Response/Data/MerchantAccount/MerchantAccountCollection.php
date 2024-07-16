<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\MerchantAccount;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class MerchantAccountCollection extends TypedCollection
{
    public function add(MerchantAccount $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof MerchantAccount) {
            throw new InvalidArgumentException('Only MerchantAccount are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return MerchantAccount::class;
    }
}
