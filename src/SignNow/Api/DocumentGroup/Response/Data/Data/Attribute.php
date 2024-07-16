<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

readonly class Attribute
{
    public function __construct(
        private bool $allowForwarding,
        private bool $showDeclineButton,
        private bool $iAmRecipient,
        private string $message = '',
        private string $subject = '',
        private int $expirationDays = 0,
        private ?Reminder $reminder = null,
        private ?Authentication $authentication = null,
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getExpirationDays(): int
    {
        return $this->expirationDays;
    }

    public function getReminder(): ?Reminder
    {
        return $this->reminder;
    }

    public function isAllowForwarding(): bool
    {
        return $this->allowForwarding;
    }

    public function isShowDeclineButton(): bool
    {
        return $this->showDeclineButton;
    }

    public function isIAmRecipient(): bool
    {
        return $this->iAmRecipient;
    }

    public function getAuthentication(): ?Authentication
    {
        return $this->authentication;
    }

    public function toArray(): array
    {
        return [
           'message' => $this->getMessage(),
           'subject' => $this->getSubject(),
           'expiration_days' => $this->getExpirationDays(),
           'reminder' => $this->getReminder(),
           'allow_forwarding' => $this->isAllowForwarding(),
           'show_decline_button' => $this->isShowDeclineButton(),
           'i_am_recipient' => $this->isIAmRecipient(),
           'authentication' => $this->getAuthentication(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['allow_forwarding'],
            $data['show_decline_button'],
            $data['i_am_recipient'],
            $data['message'] ?? '',
            $data['subject'] ?? '',
            $data['expiration_days'] ?? 0,
            isset($data['reminder']) ? Reminder::fromArray($data['reminder']) : null,
            isset($data['authentication']) ? Authentication::fromArray($data['authentication']) : null,
        );
    }
}
