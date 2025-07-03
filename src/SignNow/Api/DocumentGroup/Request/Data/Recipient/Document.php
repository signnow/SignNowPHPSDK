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

readonly class Document
{
    public function __construct(
        private string $id,
        private string $role,
        private string $action,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'role' => $this->getRole(),
           'action' => $this->getAction(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['role'],
            $data['action'],
        );
    }
}
