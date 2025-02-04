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

namespace SignNow\Api\Document\Response\Data\ExportedTo;

readonly class Storage
{
    public function __construct(
        private bool $isActive,
        private string $account = '',
    ) {
    }

    public function getAccount(): string
    {
        return $this->account;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function toArray(): array
    {
        return [
           'account' => $this->getAccount(),
           'is_active' => $this->IsActive(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['is_active'],
            $data['account'] ?? '',
        );
    }
}
