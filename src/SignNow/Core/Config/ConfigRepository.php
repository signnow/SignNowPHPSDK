<?php

declare(strict_types=1);

namespace SignNow\Core\Config;

use SignNow\Core\Token\BasicToken;

class ConfigRepository
{
    private const CLIENT_NAME = 'SignNow PHP API Client/v3.0.0';
    private const TIMEOUT = 5;

    public function __construct(
        private readonly array $config,
    ) {
    }

    public function user(): string
    {
        return $this->config['api_username'];
    }

    public function password(): string
    {
        return $this->config['api_password'];
    }

    public function basicToken(): BasicToken
    {
        return new BasicToken($this->config['api_basic_token']);
    }

    public function clientName(): string
    {
        return self::CLIENT_NAME;
    }

    public function host(): string
    {
        return $this->config['api_host'];
    }

    public function timeout(): int
    {
        return self::TIMEOUT;
    }
}
