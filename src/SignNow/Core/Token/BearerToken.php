<?php

declare(strict_types=1);

namespace SignNow\Core\Token;

readonly class BearerToken implements TokenInterface
{
    public function __construct(
        public string $accessToken,
        public string $refreshToken,
        public int $expires,
    ) {
    }

    public function type(): string
    {
        return 'Bearer';
    }

    public function token(): string
    {
        return $this->accessToken;
    }

    public function refreshToken(): string
    {
        return $this->refreshToken;
    }

    public function expires(): int
    {
        return $this->expires;
    }
}
