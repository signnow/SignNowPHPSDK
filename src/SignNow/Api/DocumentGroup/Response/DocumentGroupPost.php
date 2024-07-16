<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response;

readonly class DocumentGroupPost
{
    public function __construct(
        private string $id,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
