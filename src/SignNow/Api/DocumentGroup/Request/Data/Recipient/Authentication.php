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

namespace SignNow\Api\DocumentGroup\Request\Data\Recipient;

readonly class Authentication
{
    public function __construct(
        private string $type,
        private string $value,
        private string $phone = '',
        private string $method = '',
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
           'value' => $this->getValue(),
           'phone' => $this->getPhone(),
           'method' => $this->getMethod(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['value'],
            $data['phone'] ?? '',
            $data['method'] ?? '',
        );
    }
}
