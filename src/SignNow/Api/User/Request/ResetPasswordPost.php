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
    name: 'resetPassword',
    url: '/user/forgotpassword',
    method: 'post',
    auth: 'basic',
    namespace: 'user',
    entity: 'resetPassword',
    type: 'application/json',
)]
final class ResetPasswordPost implements RequestInterface
{
    public function __construct(
        private string $email,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
        ];
    }
}
