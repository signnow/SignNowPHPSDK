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

namespace SignNow\Api\Template\Response\Data\RoutingDetail;

readonly class InviteEmail
{
    public function __construct(
        private string $email,
        private string $subject,
        private string $message,
        private int $expirationDays,
        private bool $hasSignActions,
        private ?Reminder $reminder = null,
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

    public function getReminder(): ?Reminder
    {
        return $this->reminder;
    }

    public function getExpirationDays(): int
    {
        return $this->expirationDays;
    }

    public function hasSignActions(): bool
    {
        return $this->hasSignActions;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
           'reminder' => !is_null($this->getReminder()) ? $this->getReminder()->toArray() : null,
           'expiration_days' => $this->getExpirationDays(),
           'has_sign_actions' => $this->HasSignActions(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['subject'],
            $data['message'],
            $data['expiration_days'],
            $data['has_sign_actions'],
            isset($data['reminder']) ? Reminder::fromArray($data['reminder']) : null,
        );
    }
}
