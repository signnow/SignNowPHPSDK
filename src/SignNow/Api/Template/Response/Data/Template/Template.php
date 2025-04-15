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

namespace SignNow\Api\Template\Response\Data\Template;

readonly class Template
{
    public function __construct(
        private RoleCollection $roles,
        private string $templateName,
        private string $id,
        private string $ownerEmail,
        private Thumbnail $thumbnail,
        private ?bool $readable = null,
    ) {
    }

    public function getRoles(): RoleCollection
    {
        return $this->roles;
    }

    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getOwnerEmail(): string
    {
        return $this->ownerEmail;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function isReadable(): ?bool
    {
        return $this->readable;
    }

    public function toArray(): array
    {
        return [
           'roles' => $this->getRoles()->toArray(),
           'template_name' => $this->getTemplateName(),
           'id' => $this->getId(),
           'owner_email' => $this->getOwnerEmail(),
           'thumbnail' => $this->getThumbnail()->toArray(),
           'readable' => $this->isReadable(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new RoleCollection($data['roles']),
            $data['template_name'],
            $data['id'],
            $data['owner_email'],
            Thumbnail::fromArray($data['thumbnail']),
            $data['readable'] ?? null,
        );
    }
}
