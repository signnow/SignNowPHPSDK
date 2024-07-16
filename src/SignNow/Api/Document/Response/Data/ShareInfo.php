<?php

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
