<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getDocumentGroupRecipients',
    url: '/v2/document-groups/{document_group_id}/recipients',
    method: 'get',
    auth: 'bearer',
    namespace: 'documentGroup',
    entity: 'documentGroupRecipients',
    type: 'application/json',
)]
final class DocumentGroupRecipientsGet implements RequestInterface
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
