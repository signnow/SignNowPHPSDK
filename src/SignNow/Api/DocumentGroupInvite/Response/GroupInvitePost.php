<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response;

readonly class GroupInvitePost
{
    public function __construct(
        private string $id,
        private ?string $pendingInviteLink = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPendingInviteLink(): ?string
    {
        return $this->pendingInviteLink;
    }
}
