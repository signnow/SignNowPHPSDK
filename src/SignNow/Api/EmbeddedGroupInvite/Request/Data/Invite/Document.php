<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite;

readonly class Document
{
    public function __construct(
        private string $id,
        private string $action,
        private ?string $role = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'role' => $this->getRole(),
           'action' => $this->getAction(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['action'],
            $data['role'] ?? null,
        );
    }
}
