<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data\RoutingDetail;

readonly class InviteEmail
{
    public function __construct(
        private string $email,
        private string $subject,
        private string $message,
        private string $allowReassign,
        private int $expirationDays = 0,
        private int $reminder = 0,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
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

    public function getAllowReassign(): string
    {
        return $this->allowReassign;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
           'expiration_days' => $this->getExpirationDays(),
           'reminder' => $this->getReminder(),
           'allow_reassign' => $this->getAllowReassign(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['subject'],
            $data['message'],
            $data['allow_reassign'],
            $data['expiration_days'] ?? 0,
            $data['reminder'] ?? 0,
        );
    }
}
