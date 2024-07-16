<?php

declare(strict_types=1);

namespace SignNow\Api\User\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateUser',
    url: '/user',
    method: 'put',
    auth: 'bearer',
    namespace: 'user',
    entity: 'user',
    type: 'application/json',
)]
final class UserPut implements RequestInterface
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $password = '',
        private string $oldPassword = '',
        private string $logoutAll = '',
    ) {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function getLogoutAll(): string
    {
        return $this->logoutAll;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'first_name' => $this->getFirstName(),
           'last_name' => $this->getLastName(),
           'password' => $this->getPassword(),
           'old_password' => $this->getOldPassword(),
           'logout_all' => $this->getLogoutAll(),
        ];
    }
}
