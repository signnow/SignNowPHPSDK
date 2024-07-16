<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data;

readonly class TemplateDataObjectPut
{
    public function __construct(
        private ?string $name = null,
        private ?string $roleId = null,
    ) {
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRoleId(): ?string
    {
        return $this->roleId;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'role_id' => $this->getRoleId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['role_id'] ?? null,
        );
    }
}
