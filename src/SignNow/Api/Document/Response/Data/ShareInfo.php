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

namespace SignNow\Api\Document\Response\Data;

readonly class ShareInfo
{
    public function __construct(
        private bool $isTeamShared = false,
        private ?string $role = null,
        private bool $isPersonallySharedToOthers = false,
    ) {
    }

    public function isTeamShared(): bool
    {
        return $this->isTeamShared;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function isPersonallySharedToOthers(): bool
    {
        return $this->isPersonallySharedToOthers;
    }

    public function toArray(): array
    {
        return [
           'is_team_shared' => $this->IsTeamShared(),
           'role' => $this->getRole(),
           'is_personally_shared_to_others' => $this->isPersonallySharedToOthers(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['is_team_shared'] ?? false,
            $data['role'] ?? null,
            $data['is_personally_shared_to_others'] ?? false,
        );
    }
}
