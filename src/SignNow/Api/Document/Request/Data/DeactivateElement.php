<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data;

readonly class DeactivateElement
{
    public function __construct(
        private string $type,
        private string $uniqueId,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
           'unique_id' => $this->getUniqueId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['unique_id'],
        );
    }
}
