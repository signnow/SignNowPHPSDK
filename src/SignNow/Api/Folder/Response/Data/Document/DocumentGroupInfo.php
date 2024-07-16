<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class DocumentGroupInfo
{
    public function __construct(
        private FreeformInvite $freeformInvite,
        private ?string $documentGroupId = null,
        private ?string $documentGroupName = null,
        private ?string $inviteId = null,
        private ?string $inviteStatus = null,
        private ?string $state = null,
        private ?int $docCountInGroup = null,
        private ?bool $signAsMerged = null,
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

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getDocCountInGroup(): ?int
    {
        return $this->docCountInGroup;
    }

    public function isSignAsMerged(): ?bool
    {
        return $this->signAsMerged;
    }

    public function getFreeformInvite(): FreeformInvite
    {
        return $this->freeformInvite;
    }

    public function toArray(): array
    {
        return [
           'document_group_id' => $this->getDocumentGroupId(),
           'document_group_name' => $this->getDocumentGroupName(),
           'invite_id' => $this->getInviteId(),
           'invite_status' => $this->getInviteStatus(),
           'state' => $this->getState(),
           'doc_count_in_group' => $this->getDocCountInGroup(),
           'sign_as_merged' => $this->isSignAsMerged(),
           'freeform_invite' => $this->getFreeformInvite(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            FreeformInvite::fromArray($data['freeform_invite']),
            $data['document_group_id'] ?? null,
            $data['document_group_name'] ?? null,
            $data['invite_id'] ?? null,
            $data['invite_status'] ?? null,
            $data['state'] ?? null,
            $data['doc_count_in_group'] ?? null,
            $data['sign_as_merged'] ?? null,
        );
    }
}
