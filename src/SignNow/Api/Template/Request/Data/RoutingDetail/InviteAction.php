<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data\RoutingDetail;

readonly class InviteAction
{
    public function __construct(
        private string $email,
        private string $roleName,
        private string $action,
        private string $documentId,
        private string $documentName,
        private string $allowReassign = '',
        private string $declineBySignature = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getAllowReassign(): string
    {
        return $this->allowReassign;
    }

    public function getDeclineBySignature(): string
    {
        return $this->declineBySignature;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'role_name' => $this->getRoleName(),
           'action' => $this->getAction(),
           'document_id' => $this->getDocumentId(),
           'document_name' => $this->getDocumentName(),
           'allow_reassign' => $this->getAllowReassign(),
           'decline_by_signature' => $this->getDeclineBySignature(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['role_name'],
            $data['action'],
            $data['document_id'],
            $data['document_name'],
            $data['allow_reassign'] ?? '',
            $data['decline_by_signature'] ?? '',
        );
    }
}
