<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Request;

use SignNow\Api\DocumentGroup\Request\Data\DocumentOrderCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'downloadDocumentGroup',
    url: '/documentgroup/{document_group_id}/downloadall',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroup',
    entity: 'downloadDocumentGroup',
    type: 'application/json',
)]
final class DownloadDocumentGroupPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $type,
        private string $withHistory,
        private DocumentOrderCollection $documentOrder = new DocumentOrderCollection(),
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getWithHistory(): string
    {
        return $this->withHistory;
    }

    public function getDocumentOrder(): DocumentOrderCollection
    {
        return $this->documentOrder;
    }

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
           'type' => $this->getType(),
           'with_history' => $this->getWithHistory(),
           'document_order' => $this->getDocumentOrder()->toArray(),
        ];
    }
}
