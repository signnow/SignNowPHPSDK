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

namespace SignNow\Api\DocumentGroup\Request\Data\Recipient;

readonly class Recipient
{
    public function __construct(
        private string $name,
        private ?string $email,
        private int $order,
        private DocumentCollection $documents,
        private ?EmailGroup $emailGroup = null,
        private ?Attribute $attributes = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getEmailGroup(): ?EmailGroup
    {
        return $this->emailGroup;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getAttributes(): ?Attribute
    {
        return $this->attributes;
    }

    public function getDocuments(): DocumentCollection
    {
        return $this->documents;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'email' => $this->getEmail(),
           'email_group' => !is_null($this->getEmailGroup()) ? $this->getEmailGroup()->toArray() : null,
           'order' => $this->getOrder(),
           'attributes' => !is_null($this->getAttributes()) ? $this->getAttributes()->toArray() : null,
           'documents' => $this->getDocuments()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['order'],
            new DocumentCollection(array_map(static fn($doc) => Document::fromArray($doc), $data['documents'])),
            isset($data['email_group']) ? EmailGroup::fromArray($data['email_group']) : null,
            isset($data['attributes']) ? Attribute::fromArray($data['attributes']) : null,
        );
    }
}
