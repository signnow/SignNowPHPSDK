<?php

declare(strict_types=1);

namespace SignNow\Core\Config;

class ConfigLoader
{
    public function load(string $path): array
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
}
