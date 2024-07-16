<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response;

readonly class DocumentDelete
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
