<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class Domain
{
    public function __construct(
        private string $id,
        private string $domain,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'domain' => $this->getDomain(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['domain'],
        );
    }
}
