<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createDocumentWithTemplate',
    url: '/template/{template_id}/copy',
    method: 'post',
    auth: 'bearer',
    namespace: 'template',
    entity: 'cloneTemplate',
    type: 'application/json',
)]
final class CloneTemplatePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private ?string $documentName = null,
        private ?string $clientTimestamp = null,
        private ?string $folderId = null,
    ) {
    }

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    public function getClientTimestamp(): ?string
    {
        return $this->clientTimestamp;
    }

    public function getFolderId(): ?string
    {
        return $this->folderId;
    }

    public function withTemplateId(string $templateId): self
    {
        $this->uriParams['template_id'] = $templateId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'document_name' => $this->getDocumentName(),
           'client_timestamp' => $this->getClientTimestamp(),
           'folder_id' => $this->getFolderId(),
        ];
    }
}
