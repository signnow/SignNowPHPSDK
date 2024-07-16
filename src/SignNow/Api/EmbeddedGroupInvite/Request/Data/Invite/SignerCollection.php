<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class SignerCollection extends TypedCollection
{
    public function add(Signer $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Signer) {
            throw new InvalidArgumentException('Only Signer are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Signer::class;
    }
}
