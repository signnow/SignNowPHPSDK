<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Document
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $documentName,
        private string $pageCount,
        private string $created,
        private string $updated,
        private string $versionTime,
        private string $originalFilename,
        private string $owner,
        private ?string $originUserId,
        private Thumbnail $thumbnail,
        private bool $template,
        private RoleCollection $roles,
        private RoutingDetailCollection $routingDetails,
        private FieldInviteCollection $fieldInvites,
        private SignatureCollection $signatures,
        private SealCollection $seals,
        private TextCollection $texts,
        private CheckCollection $checks,
        private RadiobuttonCollection $radiobuttons,
        private IntegrationCollection $integrations,
        private InsertCollection $inserts,
        private TagCollection $tags,
        private FieldDocumentCollection $fields,
        private RequestCollection $requests,
        private EnumerationOptionCollection $enumerationOptions,
        private AttachmentCollection $attachments,
        private DocumentGroupInfo $documentGroupInfo,
        private ?string $originDocumentId = null,
        private ?string $projectId = null,
        private ?bool $isFavorite = null,
        private ?string $recentlyUsed = null,
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

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function getVersionTime(): string
    {
        return $this->versionTime;
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

    public function getProjectId(): ?string
    {
        return $this->projectId;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function isTemplate(): bool
    {
        return $this->template;
    }

    public function isFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function getRoles(): RoleCollection
    {
        return $this->roles;
    }

    public function getRoutingDetails(): RoutingDetailCollection
    {
        return $this->routingDetails;
    }

    public function getFieldInvites(): FieldInviteCollection
    {
        return $this->fieldInvites;
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

    public function getRadiobuttons(): RadiobuttonCollection
    {
        return $this->radiobuttons;
    }

    public function getIntegrations(): IntegrationCollection
    {
        return $this->integrations;
    }

    public function getInserts(): InsertCollection
    {
        return $this->inserts;
    }

    public function getTags(): TagCollection
    {
        return $this->tags;
    }

    public function getFields(): FieldDocumentCollection
    {
        return $this->fields;
    }

    public function getRequests(): RequestCollection
    {
        return $this->requests;
    }

    public function getEnumerationOptions(): EnumerationOptionCollection
    {
        return $this->enumerationOptions;
    }

    public function getAttachments(): AttachmentCollection
    {
        return $this->attachments;
    }

    public function getDocumentGroupInfo(): DocumentGroupInfo
    {
        return $this->documentGroupInfo;
    }

    public function getRecentlyUsed(): ?string
    {
        return $this->recentlyUsed;
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
           'version_time' => $this->getVersionTime(),
           'original_filename' => $this->getOriginalFilename(),
           'origin_document_id' => $this->getOriginDocumentId(),
           'owner' => $this->getOwner(),
           'origin_user_id' => $this->getOriginUserId(),
           'project_id' => $this->getProjectId(),
           'thumbnail' => $this->getThumbnail(),
           'template' => $this->isTemplate(),
           'is_favorite' => $this->IsFavorite(),
           'roles' => $this->getRoles()->toArray(),
           'routing_details' => $this->getRoutingDetails()->toArray(),
           'field_invites' => $this->getFieldInvites()->toArray(),
           'signatures' => $this->getSignatures()->toArray(),
           'seals' => $this->getSeals()->toArray(),
           'texts' => $this->getTexts()->toArray(),
           'checks' => $this->getChecks()->toArray(),
           'radiobuttons' => $this->getRadiobuttons()->toArray(),
           'integrations' => $this->getIntegrations()->toArray(),
           'inserts' => $this->getInserts()->toArray(),
           'tags' => $this->getTags()->toArray(),
           'fields' => $this->getFields()->toArray(),
           'requests' => $this->getRequests()->toArray(),
           'enumeration_options' => $this->getEnumerationOptions()->toArray(),
           'attachments' => $this->getAttachments()->toArray(),
           'document_group_info' => $this->getDocumentGroupInfo(),
           'recently_used' => $this->getRecentlyUsed(),
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
            $data['version_time'],
            $data['original_filename'],
            $data['owner'],
            $data['origin_user_id'],
            Thumbnail::fromArray($data['thumbnail']),
            $data['template'],
            new RoleCollection($data['roles']),
            new RoutingDetailCollection($data['routing_details']),
            new FieldInviteCollection($data['field_invites']),
            new SignatureCollection($data['signatures']),
            new SealCollection($data['seals']),
            new TextCollection($data['texts']),
            new CheckCollection($data['checks']),
            new RadiobuttonCollection($data['radiobuttons']),
            new IntegrationCollection($data['integrations']),
            new InsertCollection($data['inserts']),
            new TagCollection($data['tags']),
            new FieldDocumentCollection($data['fields']),
            new RequestCollection($data['requests']),
            new EnumerationOptionCollection($data['enumeration_options']),
            new AttachmentCollection($data['attachments']),
            DocumentGroupInfo::fromArray($data['document_group_info']),
            $data['origin_document_id'] ?? null,
            $data['project_id'] ?? null,
            $data['is_favorite'] ?? null,
            $data['recently_used'] ?? null,
        );
    }
}
