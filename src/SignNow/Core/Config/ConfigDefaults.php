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

final readonly class ConfigDefaults
{
    public const SIGNNOW_API_HOST = 'https://api.signnow.com';
    public const SIGNNOW_API_TIMEOUT = 30;
    public const USERNAME = '';
    public const PASSWORD = '';
    public const BASIC_TOKEN = '';
    public const DOWNLOADS_DIR = './storage/downloads';
}
