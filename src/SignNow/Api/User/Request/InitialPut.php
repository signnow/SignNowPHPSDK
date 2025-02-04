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
    name: 'updateUserInitials',
    url: '/user/initial',
    method: 'put',
    auth: 'bearer',
    namespace: 'User',
    entity: 'initial',
    type: 'application/json',
)]
final class InitialPut implements RequestInterface
{
    public function __construct(
        private string $data,
    ) {
    }

    public function getData(): string
    {
        return $this->data;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'data' => $this->getData(),
        ];
    }
}
