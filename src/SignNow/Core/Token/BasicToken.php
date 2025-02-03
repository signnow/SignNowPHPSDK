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
