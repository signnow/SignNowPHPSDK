<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response\Data\Invite;

readonly class Action
{
    public function __construct(
        private string $action,
        private string $documentId,
        private string $status,
        private string $roleName,
        private string $email = '',
    ) {
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function toArray(): array
    {
        return [
           'action' => $this->getAction(),
           'email' => $this->getEmail(),
           'document_id' => $this->getDocumentId(),
           'status' => $this->getStatus(),
           'role_name' => $this->getRoleName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['action'],
            $data['document_id'],
            $data['status'],
            $data['role_name'],
            $data['email'] ?? '',
        );
    }
}
