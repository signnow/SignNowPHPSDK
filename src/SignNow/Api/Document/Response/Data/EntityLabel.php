<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class EntityLabel
{
    public function __construct(
        private string $labelName,
        private bool $isSystem,
        private string $updated,
    ) {
    }

    public function getLabelName(): string
    {
        return $this->labelName;
    }

    public function isSystem(): bool
    {
        return $this->isSystem;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function toArray(): array
    {
        return [
           'label_name' => $this->getLabelName(),
           'is_system' => $this->IsSystem(),
           'updated' => $this->getUpdated(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['label_name'],
            $data['is_system'],
            $data['updated'],
        );
    }
}
