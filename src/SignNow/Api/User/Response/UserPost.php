<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response;

readonly class UserPost
{
    public function __construct(
        private string $id,
        private int $verified,
        private string $email,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getVerified(): int
    {
        return $this->verified;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
