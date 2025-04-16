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

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Document
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $documentName,
        private bool $pinned,
        private string $pageCount,
        private string $created,
        private string $updated,
        private string $recentlyUsed,
        private string $originalFilename,
        private string $entityType,
        private Thumbnail $thumbnail,
        private ?string $originDocumentId = null,
        private ?string $owner = null,
        private ?string $versionTime = null,
        private ?string $originUserId = null,
        private ?string $projectId = null,
        private ?bool $template = null,
        private ?bool $isFavorite = null,
        private ?RoleCollection $roles = new RoleCollection(),
        private ?RoutingDetailCollection $routingDetails = new RoutingDetailCollection(),
        private ?FieldInviteCollection $fieldInvites = new FieldInviteCollection(),
        private ?SignatureCollection $signatures = new SignatureCollection(),
        private ?SealCollection $seals = new SealCollection(),
        private ?TextCollection $texts = new TextCollection(),
        private ?CheckCollection $checks = new CheckCollection(),
        private ?RadiobuttonCollection $radiobuttons = new RadiobuttonCollection(),
        private ?IntegrationCollection $integrations = new IntegrationCollection(),
        private ?InsertCollection $inserts = new InsertCollection(),
        private ?TagCollection $tags = new TagCollection(),
        private ?FieldDocumentCollection $fields = new FieldDocumentCollection(),
        private ?RequestCollection $requests = new RequestCollection(),
        private ?EnumerationOptionCollection $enumerationOptions = new EnumerationOptionCollection(),
        private ?AttachmentCollection $attachments = new AttachmentCollection(),
        private ?DocumentGroupInfo $documentGroupInfo = null,
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

    public function isPinned(): bool
    {
        return $this->pinned;
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

    public function getRecentlyUsed(): string
    {
        return $this->recentlyUsed;
    }

    public function getOriginalFilename(): string
    {
        return $this->originalFilename;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function getOriginDocumentId(): ?string
    {
        return $this->originDocumentId;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function getVersionTime(): ?string
    {
        return $this->versionTime;
    }

    public function getOriginUserId(): ?string
    {
        return $this->originUserId;
    }

    public function getProjectId(): ?string
    {
        return $this->projectId;
    }

    public function isTemplate(): ?bool
    {
        return $this->template;
    }

    public function isFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function getRoles(): ?RoleCollection
    {
        return $this->roles;
    }

    public function getRoutingDetails(): ?RoutingDetailCollection
    {
        return $this->routingDetails;
    }

    public function getFieldInvites(): ?FieldInviteCollection
    {
        return $this->fieldInvites;
    }

    public function getSignatures(): ?SignatureCollection
    {
        return $this->signatures;
    }

    public function getSeals(): ?SealCollection
    {
        return $this->seals;
    }

    public function getTexts(): ?TextCollection
    {
        return $this->texts;
    }

    public function getChecks(): ?CheckCollection
    {
        return $this->checks;
    }

    public function getRadiobuttons(): ?RadiobuttonCollection
    {
        return $this->radiobuttons;
    }

    public function getIntegrations(): ?IntegrationCollection
    {
        return $this->integrations;
    }

    public function getInserts(): ?InsertCollection
    {
        return $this->inserts;
    }

    public function getTags(): ?TagCollection
    {
        return $this->tags;
    }

    public function getFields(): ?FieldDocumentCollection
    {
        return $this->fields;
    }

    public function getRequests(): ?RequestCollection
    {
        return $this->requests;
    }

    public function getEnumerationOptions(): ?EnumerationOptionCollection
    {
        return $this->enumerationOptions;
    }

    public function getAttachments(): ?AttachmentCollection
    {
        return $this->attachments;
    }

    public function getDocumentGroupInfo(): ?DocumentGroupInfo
    {
        return $this->documentGroupInfo;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'document_name' => $this->getDocumentName(),
           'pinned' => $this->isPinned(),
           'page_count' => $this->getPageCount(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'recently_used' => $this->getRecentlyUsed(),
           'original_filename' => $this->getOriginalFilename(),
           'entity_type' => $this->getEntityType(),
           'thumbnail' => $this->getThumbnail()->toArray(),
           'origin_document_id' => $this->getOriginDocumentId(),
           'owner' => $this->getOwner(),
           'version_time' => $this->getVersionTime(),
           'origin_user_id' => $this->getOriginUserId(),
           'project_id' => $this->getProjectId(),
           'template' => $this->isTemplate(),
           'is_favorite' => $this->IsFavorite(),
           'roles' => !is_null($this->getRoles()) ? $this->getRoles()->toArray() : null,
           'routing_details' => !is_null($this->getRoutingDetails()) ? $this->getRoutingDetails()->toArray() : null,
           'field_invites' => !is_null($this->getFieldInvites()) ? $this->getFieldInvites()->toArray() : null,
           'signatures' => !is_null($this->getSignatures()) ? $this->getSignatures()->toArray() : null,
           'seals' => !is_null($this->getSeals()) ? $this->getSeals()->toArray() : null,
           'texts' => !is_null($this->getTexts()) ? $this->getTexts()->toArray() : null,
           'checks' => !is_null($this->getChecks()) ? $this->getChecks()->toArray() : null,
           'radiobuttons' => !is_null($this->getRadiobuttons()) ? $this->getRadiobuttons()->toArray() : null,
           'integrations' => !is_null($this->getIntegrations()) ? $this->getIntegrations()->toArray() : null,
           'inserts' => !is_null($this->getInserts()) ? $this->getInserts()->toArray() : null,
           'tags' => !is_null($this->getTags()) ? $this->getTags()->toArray() : null,
           'fields' => !is_null($this->getFields()) ? $this->getFields()->toArray() : null,
           'requests' => !is_null($this->getRequests()) ? $this->getRequests()->toArray() : null,
           'enumeration_options' => !is_null($this->getEnumerationOptions())
               ? $this->getEnumerationOptions()->toArray()
               : null,
           'attachments' => !is_null($this->getAttachments())
               ? $this->getAttachments()->toArray()
               : null,
           'document_group_info' => !is_null($this->getDocumentGroupInfo())
               ? $this->getDocumentGroupInfo()->toArray()
               : null,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['document_name'],
            $data['pinned'],
            $data['page_count'],
            $data['created'],
            $data['updated'],
            $data['recently_used'],
            $data['original_filename'],
            $data['entity_type'],
            Thumbnail::fromArray($data['thumbnail']),
            $data['origin_document_id'] ?? null,
            $data['owner'] ?? null,
            $data['version_time'] ?? null,
            $data['origin_user_id'] ?? null,
            $data['project_id'] ?? null,
            $data['template'] ?? null,
            $data['is_favorite'] ?? null,
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
            isset($data['document_group_info']) ? DocumentGroupInfo::fromArray($data['document_group_info']) : null,
        );
    }
}
