<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup;

readonly class Email
{
    public function __construct(
        private string $email,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
        );
    }
}
