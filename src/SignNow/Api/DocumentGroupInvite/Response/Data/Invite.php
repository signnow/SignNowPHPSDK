<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response\Data;

readonly class Invite
{
    public function __construct(
        private string $link,
        private string $documentName,
        private string $inviterEmail,
        private string $action,
        private string $status,
    ) {
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getInviterEmail(): string
    {
        return $this->inviterEmail;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
           'link' => $this->getLink(),
           'document_name' => $this->getDocumentName(),
           'inviter_email' => $this->getInviterEmail(),
           'action' => $this->getAction(),
           'status' => $this->getStatus(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['link'],
            $data['document_name'],
            $data['inviter_email'],
            $data['action'],
            $data['status'],
        );
    }
}
