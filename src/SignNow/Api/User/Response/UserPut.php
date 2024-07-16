<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response;

readonly class UserPut
{
    public function __construct(
        private string $id,
        private string $firstName,
        private string $lastName,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
