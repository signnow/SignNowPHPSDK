<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data;

readonly class Folder
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $name,
        private string $created,
        private bool $shared,
        private string $documentCount,
        private string $templateCount,
        private string $folderCount,
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function isShared(): bool
    {
        return $this->shared;
    }

    public function getDocumentCount(): string
    {
        return $this->documentCount;
    }

    public function getTemplateCount(): string
    {
        return $this->templateCount;
    }

    public function getFolderCount(): string
    {
        return $this->folderCount;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'name' => $this->getName(),
           'created' => $this->getCreated(),
           'shared' => $this->isShared(),
           'document_count' => $this->getDocumentCount(),
           'template_count' => $this->getTemplateCount(),
           'folder_count' => $this->getFolderCount(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['name'],
            $data['created'],
            $data['shared'],
            $data['document_count'],
            $data['template_count'],
            $data['folder_count'],
        );
    }
}
