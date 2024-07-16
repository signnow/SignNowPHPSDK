<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Document;

readonly class DocumentItem
{
    public function __construct(
        private string $id,
        private RoleCollection $roles,
        private string $documentName,
        private Thumbnail $thumbnail,
        private ?string $originDocumentId = null,
        private bool $hasUnassignedField = false,
        private bool $hasCreditCardNumber = false,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getRoles(): RoleCollection
    {
        return $this->roles;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function getOriginDocumentId(): ?string
    {
        return $this->originDocumentId;
    }

    public function hasUnassignedField(): bool
    {
        return $this->hasUnassignedField;
    }

    public function hasCreditCardNumber(): bool
    {
        return $this->hasCreditCardNumber;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'roles' => $this->getRoles()->toArray(),
           'document_name' => $this->getDocumentName(),
           'thumbnail' => $this->getThumbnail(),
           'origin_document_id' => $this->getOriginDocumentId(),
           'has_unassigned_field' => $this->HasUnassignedField(),
           'has_credit_card_number' => $this->HasCreditCardNumber(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            new RoleCollection($data['roles']),
            $data['document_name'],
            Thumbnail::fromArray($data['thumbnail']),
            $data['origin_document_id'] ?? null,
            $data['has_unassigned_field'] ?? false,
            $data['has_credit_card_number'] ?? false,
        );
    }
}
