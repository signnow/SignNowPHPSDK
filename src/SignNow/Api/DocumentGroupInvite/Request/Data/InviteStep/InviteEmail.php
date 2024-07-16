<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

readonly class InviteEmail
{
    public function __construct(
        private string $email,
        private string $subject,
        private string $message,
        private ?EmailGroup $emailGroup = null,
        private int $expirationDays = 0,
        private int $reminder = 0,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailGroup(): ?EmailGroup
    {
        return $this->emailGroup;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getExpirationDays(): int
    {
        return $this->expirationDays;
    }

    public function getReminder(): int
    {
        return $this->reminder;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'email_group' => $this->getEmailGroup(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
           'expiration_days' => $this->getExpirationDays(),
           'reminder' => $this->getReminder(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['subject'],
            $data['message'],
            isset($data['email_group']) ? EmailGroup::fromArray($data['email_group']) : null,
            $data['expiration_days'] ?? 0,
            $data['reminder'] ?? 0,
        );
    }
}
