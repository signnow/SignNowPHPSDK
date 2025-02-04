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

namespace SignNow\Api\User\Response\Data;

readonly class Company
{
    public function __construct(
        private string $name = '',
        private bool $fullAccess = false,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isFullAccess(): bool
    {
        return $this->fullAccess;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'full_access' => $this->isFullAccess(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            $data['full_access'] ?? false,
        );
    }
}
