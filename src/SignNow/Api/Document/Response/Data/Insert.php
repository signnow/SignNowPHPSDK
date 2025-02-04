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

readonly class Insert
{
    public function __construct(
        private string $id,
        private string $location,
        private string $email = '',
        private ?string $transactionId = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'location' => $this->getLocation(),
           'email' => $this->getEmail(),
           'transaction_id' => $this->getTransactionId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['location'],
            $data['email'] ?? '',
            $data['transaction_id'] ?? null,
        );
    }
}
