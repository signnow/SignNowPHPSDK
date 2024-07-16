<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class ActiveLogo
{
    public function __construct(
        private ?string $id = null,
        private ?string $uri = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'uri' => $this->getUri(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            $data['uri'] ?? null,
        );
    }
}
