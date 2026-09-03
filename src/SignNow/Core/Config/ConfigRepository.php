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

use SignNow\Core\Token\BasicToken;

class ConfigRepository
{
    private const CLIENT_NAME = 'SignNowApiClient/v3.5.4 (PHP)';
    private const HOST = 'signnow_api_host';
    private const TIMEOUT = 'signnow_api_timeout';
    private const USERNAME = 'signnow_api_username';
    private const PASSWORD = 'signnow_api_password';
    private const BASIC_TOKEN = 'signnow_api_basic_token';
    private const DOWNLOADS_DIR = 'signnow_downloads_dir';

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
        return !empty($this->config[self::TIMEOUT])
            ? (int) $this->config[self::TIMEOUT]
            : ConfigDefaults::SIGNNOW_API_TIMEOUT;
    }

    public function projectDirectory(): string
    {
        return dirname(__DIR__, 4);
    }

    public function downloadsDirectory(): string
    {
        $path = $this->config[self::DOWNLOADS_DIR];

        return str_starts_with($path, '.')
            ? str_replace('.', $this->projectDirectory(), $path)
            : $path;
    }
}
