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

class ConfigLoader
{
    private const SIGNNOW_API_HOST = 'https://api.signnow.com';

    public function load(?string $path = null): array
    {
        return $path !== null && is_file($path)
            ? $this->loadFileConfig($path)
            : $this->loadEnvironmentVariables();
    }

    private function loadFileConfig(string $path): array
    {
        $config = [];

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (!str_starts_with($line, '#') && str_contains($line, '=')) {
                [$key, $value] = explode('=', $line, 2);
                $config[strtolower(trim($key))] = trim($value);
            }
        }

        return $config;
    }

    private function loadEnvironmentVariables(): array
    {
        return [
            'signnow_api_username' => getenv('SIGNNOW_API_USERNAME') ?? '',
            'signnow_api_password' => getenv('SIGNNOW_API_PASSWORD') ?? '',
            'signnow_api_basic_token' => getenv('SIGNNOW_API_BASIC_TOKEN') ?? '',
            'signnow_api_host' => getenv('SIGNNOW_API_HOST') ?? self::SIGNNOW_API_HOST,
        ];
    }
}
