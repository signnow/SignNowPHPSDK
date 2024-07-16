<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getDocumentFreeFormInvites',
    url: '/v2/documents/{document_id}/free-form-invites',
    method: 'get',
    auth: 'bearer',
    namespace: 'documentInvite',
    entity: 'freeFormInvite',
    type: 'application/json',
)]
final class FreeFormInviteGet implements RequestInterface
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
