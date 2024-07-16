<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Tag
{
    public function __construct(
        private string $type,
        private string $name,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
           'name' => $this->getName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['name'],
        );
    }
}
