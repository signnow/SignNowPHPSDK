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

readonly class Team
{
    public function __construct(
        private string $id,
        private string $team,
        private string $type,
        private string $createdSince,
        private string $role,
        private int $documentCount,
        private AdminCollection $admins,
        private ?string $workspaceId = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCreatedSince(): string
    {
        return $this->createdSince;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getDocumentCount(): int
    {
        return $this->documentCount;
    }

    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    public function getAdmins(): AdminCollection
    {
        return $this->admins;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'team' => $this->getTeam(),
           'type' => $this->getType(),
           'created_since' => $this->getCreatedSince(),
           'role' => $this->getRole(),
           'document_count' => $this->getDocumentCount(),
           'workspace_id' => $this->getWorkspaceId(),
           'admins' => $this->getAdmins()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['team'],
            $data['type'],
            $data['created_since'],
            $data['role'],
            $data['document_count'],
            new AdminCollection($data['admins']),
            $data['workspace_id'] ?? null,
        );
    }
}
