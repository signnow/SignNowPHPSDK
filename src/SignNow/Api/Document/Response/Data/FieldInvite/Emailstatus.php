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

namespace SignNow\Api\Document\Response\Data\FieldInvite;

readonly class Emailstatus
{
    public function __construct(
        private string $status,
        private int $createdAt,
        private int $lastReactionAt,
    ) {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getLastReactionAt(): int
    {
        return $this->lastReactionAt;
    }

    public function toArray(): array
    {
        return [
           'status' => $this->getStatus(),
           'created_at' => $this->getCreatedAt(),
           'last_reaction_at' => $this->getLastReactionAt(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['status'],
            $data['created_at'],
            $data['last_reaction_at'],
        );
    }
}
