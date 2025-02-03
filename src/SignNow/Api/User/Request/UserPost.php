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
    name: 'createUser',
    url: '/user',
    method: 'post',
    auth: 'basic',
    namespace: 'user',
    entity: 'user',
    type: 'application/json',
)]
final class UserPost implements RequestInterface
{
    public function __construct(
        private string $email,
        private string $password,
        private string $firstName = '',
        private string $lastName = '',
        private string $number = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getNumber(): string
    {
        return $this->number;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'password' => $this->getPassword(),
           'first_name' => $this->getFirstName(),
           'last_name' => $this->getLastName(),
           'number' => $this->getNumber(),
        ];
    }
}
