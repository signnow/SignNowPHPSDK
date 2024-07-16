<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request;

use SplFileInfo;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'uploadDocument',
    url: '/document',
    method: 'post',
    auth: 'bearer',
    namespace: 'document',
    entity: 'document',
    type: 'multipart/form-data',
)]
final class DocumentPost implements RequestInterface
{
    public function __construct(
        private SplFileInfo $file,
        private string $name = '',
        private bool $checkFields = false,
        private int $saveFields = 0,
        private int $makeTemplate = 0,
        private ?string $password = null,
        private ?string $folderId = null,
        private ?string $originTemplateId = null,
        private int $clientTimestamp = 0,
    ) {
    }

    public function getFile(): SplFileInfo
    {
        return $this->file;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isCheckFields(): bool
    {
        return $this->checkFields;
    }

    public function getSaveFields(): int
    {
        return $this->saveFields;
    }

    public function getMakeTemplate(): int
    {
        return $this->makeTemplate;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getFolderId(): ?string
    {
        return $this->folderId;
    }

    public function getOriginTemplateId(): ?string
    {
        return $this->originTemplateId;
    }

    public function getClientTimestamp(): int
    {
        return $this->clientTimestamp;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'file' => $this->getFile(),
           'name' => $this->getName(),
           'check_fields' => $this->isCheckFields(),
           'save_fields' => $this->getSaveFields(),
           'make_template' => $this->getMakeTemplate(),
           'password' => $this->getPassword(),
           'folder_id' => $this->getFolderId(),
           'origin_template_id' => $this->getOriginTemplateId(),
           'client_timestamp' => $this->getClientTimestamp(),
        ];
    }
}
