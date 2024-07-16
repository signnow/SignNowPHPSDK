<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data;

readonly class UpdateInviteActionAttribute
{
    public function __construct(
        private string $documentId = '',
        private int $allowReassign = 0,
        private string $declineBySignature = '',
    ) {
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getAllowReassign(): int
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
           'document_id' => $this->getDocumentId(),
           'allow_reassign' => $this->getAllowReassign(),
           'decline_by_signature' => $this->getDeclineBySignature(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['document_id'] ?? '',
            $data['allow_reassign'] ?? 0,
            $data['decline_by_signature'] ?? '',
        );
    }
}
