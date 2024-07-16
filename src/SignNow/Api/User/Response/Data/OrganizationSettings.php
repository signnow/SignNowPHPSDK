<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class OrganizationSettings
{
    public function __construct(
        private string $setting,
        private string $value,
    ) {
    }

    public function getSetting(): string
    {
        return $this->setting;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
           'setting' => $this->getSetting(),
           'value' => $this->getValue(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['setting'],
            $data['value'],
        );
    }
}
