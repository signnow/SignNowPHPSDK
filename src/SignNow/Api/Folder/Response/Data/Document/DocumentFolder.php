<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class DocumentFolder
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $documentName,
        private string $pageCount,
        private int $created,
        private int $updated,
        private string $originalFilename,
        private string $owner,
        private Thumbnail $thumbnail,
        private bool $template,
        private bool $isFavorite,
        private SignatureCollection $signatures,
        private SealCollection $seals,
        private TextCollection $texts,
        private CheckCollection $checks,
        private InsertCollection $inserts,
        private TagCollection $tags,
        private FieldCollection $fields,
        private RequestCollection $requests,
        private RoleCollection $roles,
        private FieldInviteFolderCollection $fieldInvites,
        private int $versionTime,
        private EnumerationOptionCollection $enumerationOptions,
        private AttachmentCollection $attachments,
        private ?string $originDocumentId = null,
        private ?string $originUserId = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getPageCount(): string
    {
        return $this->pageCount;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function getOriginalFilename(): string
    {
        return $this->originalFilename;
    }

    public function getOriginDocumentId(): ?string
    {
        return $this->originDocumentId;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function getOriginUserId(): ?string
    {
        return $this->originUserId;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function isTemplate(): bool
    {
        return $this->template;
    }

    public function isFavorite(): bool
    {
        return $this->isFavorite;
    }

    public function getSignatures(): SignatureCollection
    {
        return $this->signatures;
    }

    public function getSeals(): SealCollection
    {
        return $this->seals;
    }

    public function getTexts(): TextCollection
    {
        return $this->texts;
    }

    public function getChecks(): CheckCollection
    {
        return $this->checks;
    }

    public function getInserts(): InsertCollection
    {
        return $this->inserts;
    }

    public function getTags(): TagCollection
    {
        return $this->tags;
    }

    public function getFields(): FieldCollection
    {
        return $this->fields;
    }

    public function getRequests(): RequestCollection
    {
        return $this->requests;
    }

    public function getRoles(): RoleCollection
    {
        return $this->roles;
    }

    public function getFieldInvites(): FieldInviteFolderCollection
    {
        return $this->fieldInvites;
    }

    public function getVersionTime(): int
    {
        return $this->versionTime;
    }

    public function getEnumerationOptions(): EnumerationOptionCollection
    {
        return $this->enumerationOptions;
    }

    public function getAttachments(): AttachmentCollection
    {
        return $this->attachments;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'document_name' => $this->getDocumentName(),
           'page_count' => $this->getPageCount(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'original_filename' => $this->getOriginalFilename(),
           'origin_document_id' => $this->getOriginDocumentId(),
           'owner' => $this->getOwner(),
           'origin_user_id' => $this->getOriginUserId(),
           'thumbnail' => $this->getThumbnail(),
           'template' => $this->isTemplate(),
           'is_favorite' => $this->IsFavorite(),
           'signatures' => $this->getSignatures()->toArray(),
           'seals' => $this->getSeals()->toArray(),
           'texts' => $this->getTexts()->toArray(),
           'checks' => $this->getChecks()->toArray(),
           'inserts' => $this->getInserts()->toArray(),
           'tags' => $this->getTags()->toArray(),
           'fields' => $this->getFields()->toArray(),
           'requests' => $this->getRequests()->toArray(),
           'roles' => $this->getRoles()->toArray(),
           'field_invites' => $this->getFieldInvites()->toArray(),
           'version_time' => $this->getVersionTime(),
           'enumeration_options' => $this->getEnumerationOptions()->toArray(),
           'attachments' => $this->getAttachments()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['document_name'],
            $data['page_count'],
            $data['created'],
            $data['updated'],
            $data['original_filename'],
            $data['owner'],
            Thumbnail::fromArray($data['thumbnail']),
            $data['template'],
            $data['is_favorite'],
            new SignatureCollection($data['signatures']),
            new SealCollection($data['seals']),
            new TextCollection($data['texts']),
            new CheckCollection($data['checks']),
            new InsertCollection($data['inserts']),
            new TagCollection($data['tags']),
            new FieldCollection($data['fields']),
            new RequestCollection($data['requests']),
            new RoleCollection($data['roles']),
            new FieldInviteFolderCollection($data['field_invites']),
            $data['version_time'],
            new EnumerationOptionCollection($data['enumeration_options']),
            new AttachmentCollection($data['attachments']),
            $data['origin_document_id'] ?? null,
            $data['origin_user_id'] ?? null,
        );
    }
}
