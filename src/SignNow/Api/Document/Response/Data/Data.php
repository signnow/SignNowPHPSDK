<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Data
{
    public function __construct(
        private string $id,
        private string $name,
        private string $type,
        private string $value = '',
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

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'name' => $this->getName(),
           'type' => $this->getType(),
           'value' => $this->getValue(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['type'],
            $data['value'] ?? '',
        );
    }
}
