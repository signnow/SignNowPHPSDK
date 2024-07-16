<?php

declare(strict_types=1);

namespace SignNow\Api\Auth\Response;

readonly class TokenPost
{
    public function __construct(
        private int $expiresIn,
        private string $tokenType,
        private string $accessToken,
        private string $refreshToken,
        private string $scope,
        private int $lastLogin,
    ) {
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getLastLogin(): int
    {
        return $this->lastLogin;
    }
}
