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

namespace SignNow\Api\User\Response\Data\Team;

readonly class Admin
{
    public function __construct(
        private string $id,
        private string $isSecondary,
        private string $email,
        private int $billing,
        private int $documentAccess,
        private bool $primary,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getIsSecondary(): string
    {
        return $this->isSecondary;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBilling(): int
    {
        return $this->billing;
    }

    public function getDocumentAccess(): int
    {
        return $this->documentAccess;
    }

    public function isPrimary(): bool
    {
        return $this->primary;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'is_secondary' => $this->getIsSecondary(),
           'email' => $this->getEmail(),
           'billing' => $this->getBilling(),
           'document_access' => $this->getDocumentAccess(),
           'primary' => $this->isPrimary(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['is_secondary'],
            $data['email'],
            $data['billing'],
            $data['document_access'],
            $data['primary'],
        );
    }
}
