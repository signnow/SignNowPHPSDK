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

namespace SignNow\Api\Webhook\Response\Data\Data;

readonly class Content
{
    public function __construct(
        private string $key = '',
        private string $key1 = '',
        private string $key2 = '',
        private string $accountId = '',
        private string $source = '',
    ) {
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getKey1(): string
    {
        return $this->key1;
    }

    public function getKey2(): string
    {
        return $this->key2;
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function toArray(): array
    {
        return [
           'key' => $this->getKey(),
           'key1' => $this->getKey1(),
           'key2' => $this->getKey2(),
           'account_id' => $this->getAccountId(),
           'source' => $this->getSource(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['key'] ?? '',
            $data['key1'] ?? '',
            $data['key2'] ?? '',
            $data['account_id'] ?? '',
            $data['source'] ?? '',
        );
    }
}
