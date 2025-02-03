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

namespace SignNow\Api\EmbeddedInvite\Request\Data;

readonly class Authentication
{
    public function __construct(
        private string $type,
        private string $password = '',
        private string $method = '',
        private string $phone = '',
        private string $smsMessage = '',
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getSmsMessage(): string
    {
        return $this->smsMessage;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
           'password' => $this->getPassword(),
           'method' => $this->getMethod(),
           'phone' => $this->getPhone(),
           'sms_message' => $this->getSmsMessage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['password'] ?? '',
            $data['method'] ?? '',
            $data['phone'] ?? '',
            $data['sms_message'] ?? '',
        );
    }
}
