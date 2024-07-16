<?php

declare(strict_types=1);

namespace SignNow\Core\Token;

readonly class BasicToken implements TokenInterface
{
    public function __construct(
        public string $token,
    ) {
    }

    public function type(): string
    {
        return 'Basic';
    }

    public function token(): string
    {
        return $this->token;
    }
}
