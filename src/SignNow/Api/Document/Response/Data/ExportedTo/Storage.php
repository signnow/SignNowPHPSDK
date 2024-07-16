<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ExportedTo;

readonly class Storage
{
    public function __construct(
        private bool $isActive,
        private string $account = '',
    ) {
    }

    public function getAccount(): string
    {
        return $this->account;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function toArray(): array
    {
        return [
           'account' => $this->getAccount(),
           'is_active' => $this->IsActive(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['is_active'],
            $data['account'] ?? '',
        );
    }
}
