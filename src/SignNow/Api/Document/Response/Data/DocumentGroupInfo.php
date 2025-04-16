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

readonly class DocumentGroupInfo
{
    public function __construct(
        private ?string $documentGroupId = null,
        private ?string $documentGroupName = null,
        private ?string $inviteId = null,
        private ?string $inviteStatus = null,
        private bool $signAsMerged = false,
        private int $docCountInGroup = 0,
        private ?FreeformInvite $freeformInvite = null,
        private ?string $state = null,
    ) {
    }

    public function getDocumentGroupId(): ?string
    {
        return $this->documentGroupId;
    }

    public function getDocumentGroupName(): ?string
    {
        return $this->documentGroupName;
    }

    public function getInviteId(): ?string
    {
        return $this->inviteId;
    }

    public function getInviteStatus(): ?string
    {
        return $this->inviteStatus;
    }

    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged;
    }

    public function getDocCountInGroup(): int
    {
        return $this->docCountInGroup;
    }

    public function getFreeformInvite(): ?FreeformInvite
    {
        return $this->freeformInvite;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function toArray(): array
    {
        return [
           'document_group_id' => $this->getDocumentGroupId(),
           'document_group_name' => $this->getDocumentGroupName(),
           'invite_id' => $this->getInviteId(),
           'invite_status' => $this->getInviteStatus(),
           'sign_as_merged' => $this->isSignAsMerged(),
           'doc_count_in_group' => $this->getDocCountInGroup(),
           'freeform_invite' => !is_null($this->getFreeformInvite()) ? $this->getFreeformInvite()->toArray() : null,
           'state' => $this->getState(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['document_group_id'] ?? null,
            $data['document_group_name'] ?? null,
            $data['invite_id'] ?? null,
            $data['invite_status'] ?? null,
            $data['sign_as_merged'] ?? false,
            $data['doc_count_in_group'] ?? 0,
            isset($data['freeform_invite']) ? FreeformInvite::fromArray($data['freeform_invite']) : null,
            $data['state'] ?? null,
        );
    }
}
