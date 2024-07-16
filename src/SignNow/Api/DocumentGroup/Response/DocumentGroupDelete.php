<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response;

readonly class DocumentGroupDelete
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
