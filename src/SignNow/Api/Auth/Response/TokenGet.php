<?php

declare(strict_types=1);

namespace SignNow\Api\Auth\Response;

readonly class TokenGet
{
    public function __construct(
        private string $accessToken,
        private string $scope,
        private string $expiresIn,
        private string $tokenType,
    ) {
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getExpiresIn(): string
    {
        return $this->expiresIn;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }
}
