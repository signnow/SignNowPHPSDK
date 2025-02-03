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

namespace SignNow\Api\Auth\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'refreshAccessToken',
    url: '/oauth2/token',
    method: 'post',
    auth: 'basic',
    namespace: 'auth',
    entity: 'refreshToken',
    type: 'application/x-www-form-urlencoded',
)]
final class RefreshTokenPost implements RequestInterface
{
    public function __construct(
        private string $refreshToken,
        private string $scope = '*',
        private string $expirationTime = '',
        private string $grantType = 'refresh_token',
    ) {
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getExpirationTime(): string
    {
        return $this->expirationTime;
    }

    public function getGrantType(): string
    {
        return $this->grantType;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'refresh_token' => $this->getRefreshToken(),
           'scope' => $this->getScope(),
           'expiration_time' => $this->getExpirationTime(),
           'grant_type' => $this->getGrantType(),
        ];
    }
}
