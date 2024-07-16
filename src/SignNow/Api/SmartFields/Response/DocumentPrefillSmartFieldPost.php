<?php

declare(strict_types=1);

namespace SignNow\Api\SmartFields\Response;

readonly class DocumentPrefillSmartFieldPost
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
