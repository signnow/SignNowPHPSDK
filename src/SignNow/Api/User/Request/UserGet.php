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
