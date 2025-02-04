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
        private bool $isTeamShared,
    ) {
    }

    public function isTeamShared(): bool
    {
        return $this->isTeamShared;
    }

    public function toArray(): array
    {
        return [
           'is_team_shared' => $this->IsTeamShared(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['is_team_shared'],
        );
    }
}
