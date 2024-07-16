<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response;

readonly class BulkInvitePost
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
