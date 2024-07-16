<?php

declare(strict_types=1);

namespace SignNow\Api\Auth\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'verifyAccessToken',
    url: '/oauth2/token',
    method: 'get',
    auth: 'bearer',
    namespace: 'auth',
    entity: 'token',
    type: 'application/json',
)]
final class TokenGet implements RequestInterface
{
    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
