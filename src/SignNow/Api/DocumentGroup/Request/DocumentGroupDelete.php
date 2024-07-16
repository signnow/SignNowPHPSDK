<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'deleteDocumentGroup',
    url: '/documentgroup/{document_group_id}',
    method: 'delete',
    auth: 'bearer',
    namespace: 'documentGroup',
    entity: 'documentGroup',
    type: 'application/json',
)]
final class DocumentGroupDelete implements RequestInterface
{
    private array $uriParams = [];


    public function withDocumentGroupId(string $documentGroupId): self
    {
        $this->uriParams['document_group_id'] = $documentGroupId;

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
