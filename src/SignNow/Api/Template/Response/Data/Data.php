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

namespace SignNow\Api\Template\Response\Data;

readonly class Data
{
    public function __construct(
        private string $name,
        private string $roleId,
        private int $signingOrder,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getSigningOrder(): int
    {
        return $this->signingOrder;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'role_id' => $this->getRoleId(),
           'signing_order' => $this->getSigningOrder(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['role_id'],
            $data['signing_order'],
        );
    }
}
