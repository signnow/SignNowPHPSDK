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

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

readonly class AllowedUnmappedSignDocument
{
    public function __construct(
        private string $id,
        private string $role,
        private string $recipient,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'role' => $this->getRole(),
           'recipient' => $this->getRecipient(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['role'],
            $data['recipient'],
        );
    }
}
