<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getDocumentFields',
    url: '/v2/documents/{document_id}/fields',
    method: 'get',
    auth: 'bearer',
    namespace: 'document',
    entity: 'fields',
    type: 'application/json',
)]
final class FieldsGet implements RequestInterface
{
    private array $uriParams = [];


    public function withDocumentId(string $documentId): self
    {
        $this->uriParams['document_id'] = $documentId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
