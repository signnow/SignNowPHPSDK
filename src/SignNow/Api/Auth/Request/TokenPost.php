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
    name: 'generateAccessToken',
    url: '/oauth2/token',
    method: 'post',
    auth: 'basic',
    namespace: 'auth',
    entity: 'token',
    type: 'application/x-www-form-urlencoded',
)]
final class TokenPost implements RequestInterface
{
    public function __construct(
        private string $username,
        private string $password,
        private string $grantType,
        private string $scope = '*',
        private string $code = '',
    ) {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGrantType(): string
    {
        return $this->grantType;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getCode(): string
    {
        return $this->code;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'username' => $this->getUsername(),
           'password' => $this->getPassword(),
           'grant_type' => $this->getGrantType(),
           'scope' => $this->getScope(),
           'code' => $this->getCode(),
        ];
    }
}
