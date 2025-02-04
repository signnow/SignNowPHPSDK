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

namespace SignNow\Api\Folder\Response;

use SignNow\Api\Folder\Response\Data\FolderCollection;
use SignNow\Api\Folder\Response\Data\Document\DocumentCollection;

readonly class FolderDocumentsGet
{
    public function __construct(
        private string $id,
        private string $created,
        private string $name,
        private string $userId,
        private bool $systemFolder,
        private bool $shared,
        private FolderCollection $folders,
        private int $totalDocuments,
        private DocumentCollection $documents,
        private ?string $parentId = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function isSystemFolder(): bool
    {
        return $this->systemFolder;
    }

    public function isShared(): bool
    {
        return $this->shared;
    }

    public function getFolders(): FolderCollection
    {
        return $this->folders;
    }

    public function getTotalDocuments(): int
    {
        return $this->totalDocuments;
    }

    public function getDocuments(): DocumentCollection
    {
        return $this->documents;
    }
}
