<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class FieldInviteFolder
{
    public function __construct(
        private string $id,
        private string $status,
        private int $updated,
        private string $email,
        private string $role,
        private EmailSentstatusCollection $emailSentStatuses,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getEmailSentStatuses(): EmailSentstatusCollection
    {
        return $this->emailSentStatuses;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'status' => $this->getStatus(),
           'updated' => $this->getUpdated(),
           'email' => $this->getEmail(),
           'role' => $this->getRole(),
           'email_sent_statuses' => $this->getEmailSentStatuses()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'],
            $data['updated'],
            $data['email'],
            $data['role'],
            new EmailSentstatusCollection($data['email_sent_statuses']),
        );
    }
}
