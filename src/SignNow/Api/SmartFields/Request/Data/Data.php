<?php

declare(strict_types=1);

namespace SignNow\Api\SmartFields\Request\Data;

readonly class Data
{
    public function __construct(
        private string $fieldName = '',
    ) {
    }

    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    public function toArray(): array
    {
        return [
           'field_name' => $this->getFieldName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['field_name'] ?? '',
        );
    }
}
