<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Core\Token;

readonly class BearerToken implements TokenInterface
{
    public function __construct(
        public string $accessToken,
        public string $refreshToken = '',
        public int $expires = 0,
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

    public function isEmpty(): bool
    {
        return $this->token() === '';
    }

    public function __toString(): string
    {
        return $this->token();
    }
}
