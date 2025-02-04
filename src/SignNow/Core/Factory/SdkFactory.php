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

namespace SignNow\Core\Factory;

use Exception;
use SignNow\ApiClient;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk;

class SdkFactory
{
    /**
     * @throws SignNowApiException
     * @throws Exception
     */
    public static function createApiClient(BearerToken|string $token = ''): ApiClient
    {
        if (($token === '') || ($token instanceof BearerToken && $token->isEmpty())) {
            return (new Sdk())
                ->build()
                ->authenticate()
                ->getApiClient();
        }

        return (new Sdk())
            ->build()
            ->authenticate()
            ->withBearerToken(is_string($token) ? new BearerToken($token) : $token)
            ->getApiClient();
    }

    /**
     * @throws SignNowApiException
     * @throws Exception
     */
    public static function createApiClientWithConfig(string $configPath): ApiClient
    {
        return (new Sdk($configPath))
            ->build()
            ->authenticate()
            ->getApiClient();
    }
}
