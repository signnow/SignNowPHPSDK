<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createTemplate',
    url: '/template',
    method: 'post',
    auth: 'bearer',
    namespace: 'template',
    entity: 'template',
    type: 'application/json',
)]
final class TemplatePost implements RequestInterface
{
    public function __construct(
        private string $documentId,
        private string $documentName,
    ) {
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'document_id' => $this->getDocumentId(),
           'document_name' => $this->getDocumentName(),
        ];
    }
}
