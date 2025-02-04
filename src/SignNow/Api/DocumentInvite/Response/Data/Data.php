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

namespace SignNow\Api\DocumentInvite\Response\Data;

readonly class Data
{
    public function __construct(
        private string $id,
        private string $status,
        private int $created,
        private string $email,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'status' => $this->getStatus(),
           'created' => $this->getCreated(),
           'email' => $this->getEmail(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'],
            $data['created'],
            $data['email'],
        );
    }
}
