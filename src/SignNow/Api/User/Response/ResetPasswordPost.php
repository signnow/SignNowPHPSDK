<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response;

readonly class ResetPasswordPost
{
    public function __construct(
        private string $status,
    ) {
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
