<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response;

readonly class DocumentMovePost
{
    public function __construct(
        private string $result,
    ) {
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
