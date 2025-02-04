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

namespace SignNow\Api\User\Response\Data\PremiumAccess;

readonly class User
{
    public function __construct(
        private string $username,
        private string $email,
        private int $addedDate,
        private string $status,
        private string $admin,
        private string $firstName = '',
        private string $lastName = '',
    ) {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAddedDate(): int
    {
        return $this->addedDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getAdmin(): string
    {
        return $this->admin;
    }

    public function toArray(): array
    {
        return [
           'username' => $this->getUsername(),
           'email' => $this->getEmail(),
           'first_name' => $this->getFirstName(),
           'last_name' => $this->getLastName(),
           'added_date' => $this->getAddedDate(),
           'status' => $this->getStatus(),
           'admin' => $this->getAdmin(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['username'],
            $data['email'],
            $data['added_date'],
            $data['status'],
            $data['admin'],
            $data['first_name'] ?? '',
            $data['last_name'] ?? '',
        );
    }
}
