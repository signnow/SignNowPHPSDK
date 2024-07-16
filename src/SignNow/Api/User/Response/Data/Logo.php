<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class Logo
{
    public function __construct(
        private string $id,
        private string $name,
        private bool $active,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'name' => $this->getName(),
           'active' => $this->isActive(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['active'],
        );
    }
}
