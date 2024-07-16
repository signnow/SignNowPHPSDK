<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Request\Data;

readonly class Header
{
    public function __construct(
        private string $stringHead = '',
        private int $intHead = 0,
        private bool $boolHead = false,
        private float $floatHead = 0,
    ) {
    }

    public function getStringHead(): string
    {
        return $this->stringHead;
    }

    public function getIntHead(): int
    {
        return $this->intHead;
    }

    public function isBoolHead(): bool
    {
        return $this->boolHead;
    }

    public function getFloatHead(): float
    {
        return $this->floatHead;
    }

    public function toArray(): array
    {
        return [
           'string_head' => $this->getStringHead(),
           'int_head' => $this->getIntHead(),
           'bool_head' => $this->isBoolHead(),
           'float_head' => $this->getFloatHead(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['string_head'] ?? '',
            $data['int_head'] ?? 0,
            $data['bool_head'] ?? false,
            $data['float_head'] ?? 0,
        );
    }
}
