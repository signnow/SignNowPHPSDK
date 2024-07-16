<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentField\Request\Data;

readonly class Field
{
    public function __construct(
        private string $fieldName,
        private string $prefilledText,
    ) {
    }

    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    public function getPrefilledText(): string
    {
        return $this->prefilledText;
    }

    public function toArray(): array
    {
        return [
           'field_name' => $this->getFieldName(),
           'prefilled_text' => $this->getPrefilledText(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['field_name'],
            $data['prefilled_text'],
        );
    }
}
