<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Role
{
    public function __construct(
        private string $uniqueId,
        private string $signingOrder,
        private string $name,
    ) {
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function getSigningOrder(): string
    {
        return $this->signingOrder;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
           'unique_id' => $this->getUniqueId(),
           'signing_order' => $this->getSigningOrder(),
           'name' => $this->getName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['unique_id'],
            $data['signing_order'],
            $data['name'],
        );
    }
}
