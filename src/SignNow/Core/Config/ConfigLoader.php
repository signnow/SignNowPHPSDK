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
    public function load(?string $path = null): array
    {
        return $path !== null && is_file($path)
            ? $this->loadFileConfig($path)
            : $this->loadEnvironmentVariablesOrDefaults();
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

    private function loadEnvironmentVariablesOrDefaults(): array
    {
        return [
            'signnow_api_username' => $this->getEnvOrDefault('SIGNNOW_API_USERNAME', ConfigDefaults::USERNAME),
            'signnow_api_password' => $this->getEnvOrDefault('SIGNNOW_API_PASSWORD', ConfigDefaults::PASSWORD),
            'signnow_api_basic_token' => $this->getEnvOrDefault('SIGNNOW_API_BASIC_TOKEN', ConfigDefaults::BASIC_TOKEN),
            'signnow_api_host' => $this->getEnvOrDefault('SIGNNOW_API_HOST', ConfigDefaults::SIGNNOW_API_HOST),
            'signnow_downloads_dir' => $this->getEnvOrDefault('SIGNNOW_DOWNLOADS_DIR', ConfigDefaults::DOWNLOADS_DIR),
            'signnow_api_timeout' => getenv('SIGNNOW_API_TIMEOUT') ?? ConfigDefaults::SIGNNOW_API_TIMEOUT,
        ];
    }

    private function getEnvOrDefault(string $envVar, string $default = ''): string
    {
        $value = getenv($envVar);

        return $value === false ? $default : $value;
    }
}
