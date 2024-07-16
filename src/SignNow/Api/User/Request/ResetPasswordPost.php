<?php

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
