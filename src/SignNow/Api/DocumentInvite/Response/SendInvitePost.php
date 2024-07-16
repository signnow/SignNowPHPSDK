<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Response;

readonly class SendInvitePost
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
