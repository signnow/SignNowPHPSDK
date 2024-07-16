<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ViewerFieldInvite;

readonly class EmailGroup
{
    public function __construct(
        private ?string $id = null,
        private ?string $name = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'name' => $this->getName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? null,
        );
    }
}
