<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response;

readonly class ReassignSignerPost
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
