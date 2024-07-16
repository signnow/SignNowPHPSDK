<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response;

readonly class TemplatePost
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
