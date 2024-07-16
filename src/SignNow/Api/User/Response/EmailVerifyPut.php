<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response;

readonly class EmailVerifyPut
{
    public function __construct(
        private string $email = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
