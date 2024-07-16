<?php

declare(strict_types=1);

namespace SignNow\Api\User\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getUserInitials',
    url: '/user/initial',
    method: 'get',
    auth: 'bearer',
    namespace: 'User',
    entity: 'initial',
    type: 'application/json',
)]
final class InitialGet implements RequestInterface
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
