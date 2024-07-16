<?php

declare(strict_types=1);

namespace SignNow\Api\User\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getUserInfo',
    url: '/user',
    method: 'get',
    auth: 'bearer',
    namespace: 'user',
    entity: 'user',
    type: 'application/json',
)]
final class UserGet implements RequestInterface
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
