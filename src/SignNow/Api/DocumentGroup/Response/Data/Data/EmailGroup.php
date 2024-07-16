<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

readonly class EmailGroup
{
    public function __construct(
        private string $id = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? '',
        );
    }
}
