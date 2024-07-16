<?php

declare(strict_types=1);

namespace SignNow\Api\User\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'userEmailVerify',
    url: '/user/email/verify',
    method: 'put',
    auth: 'basic',
    namespace: 'user',
    entity: 'emailVerify',
    type: 'application/json',
)]
final class EmailVerifyPut implements RequestInterface
{
    public function __construct(
        private string $email,
        private string $verificationToken,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getVerificationToken(): string
    {
        return $this->verificationToken;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'verification_token' => $this->getVerificationToken(),
        ];
    }
}
