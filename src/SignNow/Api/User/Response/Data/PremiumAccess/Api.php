<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\PremiumAccess;

readonly class Api
{
    public function __construct(
        private string $key,
        private int $createdAt,
        private int $expiredAt,
        private string $level,
    ) {
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getExpiredAt(): int
    {
        return $this->expiredAt;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function toArray(): array
    {
        return [
           'key' => $this->getKey(),
           'created_at' => $this->getCreatedAt(),
           'expired_at' => $this->getExpiredAt(),
           'level' => $this->getLevel(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['key'],
            $data['created_at'],
            $data['expired_at'],
            $data['level'],
        );
    }
}
