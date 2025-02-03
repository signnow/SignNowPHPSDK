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

namespace SignNow\Core\Config;

use RuntimeException;
use SignNow\Core\Token\BasicToken;

class ConfigRepository
{
    private const CLIENT_NAME = 'SignNowApiClient/v3.0.0 (PHP)';
    private const TIMEOUT = 5;
    private const HOST = 'signnow_api_host';
    private const USERNAME = 'signnow_api_username';
    private const PASSWORD = 'signnow_api_password';
    private const BASIC_TOKEN = 'signnow_api_basic_token';

    public function __construct(
        private readonly array $config,
    ) {
    }

    public function user(): string
    {
        return $this->config[self::USERNAME];
    }

    public function password(): string
    {
        return $this->config[self::PASSWORD];
    }

    public function basicToken(): BasicToken
    {
        return new BasicToken($this->config[self::BASIC_TOKEN]);
    }

    public function clientName(): string
    {
        return self::CLIENT_NAME;
    }

    public function host(): string
    {
        return $this->config[self::HOST];
    }

    public function timeout(): int
    {
        return self::TIMEOUT;
    }

    public function validate(): void
    {
        foreach ([self::USERNAME, self::PASSWORD, self::BASIC_TOKEN, self::HOST] as $key) {
            if (empty($this->config[$key])) {
                throw new RuntimeException('Required environment variable is missing: ' . strtoupper($key));
            }
        }
    }
}
