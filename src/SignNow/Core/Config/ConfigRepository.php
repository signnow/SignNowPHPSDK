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
    private const CLIENT_NAME = 'SignNowApiClient/v3.5.0 (PHP)';
    private const TIMEOUT = 10;
    private const HOST = 'signnow_api_host';
    private const USERNAME = 'signnow_api_username';
    private const PASSWORD = 'signnow_api_password';
    private const BASIC_TOKEN = 'signnow_api_basic_token';
    private const DOWNLOADS_DIR = 'signnow_downloads_dir';
    public const DEFAULT_DOWNLOADS_DIR = './storage/downloads';

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

    public function projectDirectory(): string
    {
        return dirname(__DIR__, 4);
    }

    public function downloadsDirectory(): string
    {
        $path = !empty($this->config[self::DOWNLOADS_DIR])
            ? $this->config[self::DOWNLOADS_DIR]
            : self::DEFAULT_DOWNLOADS_DIR;

        return str_starts_with($path, '.') ? str_replace('.', $this->projectDirectory(), $path) : $path;
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
