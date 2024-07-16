<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data;

readonly class Signature
{
    public function __construct(
        private string $type,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
        );
    }
}
