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

namespace SignNow\Api\DocumentGroupTemplate\Response\Data\Data;

readonly class Data
{
    public function __construct(
        private string $uniqueId,
        private string $name,
        private int $created,
        private string $state,
        private string $ownerEmail,
        private DocumentCollection $documents,
        private Owner $owner,
        private ?string $inviteId = null,
        private ?string $lastInviteId = null,
    ) {
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getInviteId(): ?string
    {
        return $this->inviteId;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getLastInviteId(): ?string
    {
        return $this->lastInviteId;
    }

    public function getOwnerEmail(): string
    {
        return $this->ownerEmail;
    }

    public function getDocuments(): DocumentCollection
    {
        return $this->documents;
    }

    public function getOwner(): Owner
    {
        return $this->owner;
    }

    public function toArray(): array
    {
        return [
           'unique_id' => $this->getUniqueId(),
           'name' => $this->getName(),
           'created' => $this->getCreated(),
           'invite_id' => $this->getInviteId(),
           'state' => $this->getState(),
           'last_invite_id' => $this->getLastInviteId(),
           'owner_email' => $this->getOwnerEmail(),
           'documents' => $this->getDocuments()->toArray(),
           'owner' => $this->getOwner()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['unique_id'],
            $data['name'],
            $data['created'],
            $data['state'],
            $data['owner_email'],
            new DocumentCollection($data['documents']),
            Owner::fromArray($data['owner']),
            $data['invite_id'] ?? null,
            $data['last_invite_id'] ?? null,
        );
    }
}
