<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data;

readonly class Viewer
{
    public function __construct(
        private string $email,
        private string $role,
        private int $order,
        private string $subject,
        private string $message,
        private string $closeRedirectUri = '',
        private string $redirectTarget = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getCloseRedirectUri(): string
    {
        return $this->closeRedirectUri;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'role' => $this->getRole(),
           'order' => $this->getOrder(),
           'close_redirect_uri' => $this->getCloseRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['role'],
            $data['order'],
            $data['subject'],
            $data['message'],
            $data['close_redirect_uri'] ?? '',
            $data['redirect_target'] ?? '',
        );
    }
}
