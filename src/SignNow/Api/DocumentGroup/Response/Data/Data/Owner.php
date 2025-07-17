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

readonly class Owner
{
    public function __construct(
        private string $id,
        private string $email,
        private Organization $organization,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getOrganization(): Organization
    {
        return $this->organization;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'email' => $this->getEmail(),
           'organization' => $this->getOrganization()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['email'],
            Organization::fromArray($data['organization']),
        );
    }
}
