<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class DisplayJsonAttribute
{
    public function __construct(
        private string $webShortName,
        private string $webDescription,
        private bool $common,
        private bool $disabled,
        private ?int $dateTimeFieldOrder = null,
        private ?int $textFieldOrder = null,
        private string $webLocaleKey = '',
    ) {
    }

    public function getWebShortName(): string
    {
        return $this->webShortName;
    }

    public function getWebDescription(): string
    {
        return $this->webDescription;
    }

    public function isCommon(): bool
    {
        return $this->common;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function getDateTimeFieldOrder(): ?int
    {
        return $this->dateTimeFieldOrder;
    }

    public function getTextFieldOrder(): ?int
    {
        return $this->textFieldOrder;
    }

    public function getWebLocaleKey(): string
    {
        return $this->webLocaleKey;
    }

    public function toArray(): array
    {
        return [
           'web_short_name' => $this->getWebShortName(),
           'web_description' => $this->getWebDescription(),
           'common' => $this->isCommon(),
           'disabled' => $this->isDisabled(),
           'date_time_field_order' => $this->getDateTimeFieldOrder(),
           'text_field_order' => $this->getTextFieldOrder(),
           'web_locale_key' => $this->getWebLocaleKey(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['web_short_name'],
            $data['web_description'],
            $data['common'],
            $data['disabled'],
            $data['date_time_field_order'] ?? null,
            $data['text_field_order'] ?? null,
            $data['web_locale_key'] ?? '',
        );
    }
}
