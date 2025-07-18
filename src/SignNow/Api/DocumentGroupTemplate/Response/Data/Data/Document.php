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

namespace SignNow\Api\DocumentGroupTemplate\Response\Data\Data;

readonly class Document
{
    public function __construct(
        private RoleCollection $roles,
        private string $documentName,
        private string $id,
        private Thumbnail $thumbnail,
        private string $originDocumentId,
        private bool $hasUnassignedField,
        private bool $hasCreditCardNumber,
    ) {
    }

    public function getRoles(): RoleCollection
    {
        return $this->roles;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function getOriginDocumentId(): string
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
           'roles' => $this->getRoles()->toArray(),
           'document_name' => $this->getDocumentName(),
           'id' => $this->getId(),
           'thumbnail' => $this->getThumbnail()->toArray(),
           'origin_document_id' => $this->getOriginDocumentId(),
           'has_unassigned_field' => $this->HasUnassignedField(),
           'has_credit_card_number' => $this->HasCreditCardNumber(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new RoleCollection($data['roles']),
            $data['document_name'],
            $data['id'],
            Thumbnail::fromArray($data['thumbnail']),
            $data['origin_document_id'],
            $data['has_unassigned_field'],
            $data['has_credit_card_number'],
        );
    }
}
