<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Request\Data;

readonly class Header
{
    public function __construct(
        private string $stringHead,
        private int $intHead,
        private bool $boolHead,
        private float $floatHead,
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
            $data['string_head'],
            $data['int_head'],
            $data['bool_head'],
            $data['float_head'],
        );
    }
}
