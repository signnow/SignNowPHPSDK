<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response;

readonly class DocumentPut
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
