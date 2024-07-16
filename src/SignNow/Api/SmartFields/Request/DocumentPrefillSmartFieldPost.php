<?php

declare(strict_types=1);

namespace SignNow\Api\SmartFields\Request;

use SignNow\Api\SmartFields\Request\Data\DataCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'prefillSmartFields',
    url: '/document/{document_id}/integration/object/smartfields',
    method: 'post',
    auth: 'bearer',
    namespace: 'smartFields',
    entity: 'documentPrefillSmartField',
    type: 'application/json',
)]
final class DocumentPrefillSmartFieldPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private DataCollection $data,
        private string $clientTimestamp,
    ) {
    }

    public function getData(): DataCollection
    {
        return $this->data;
    }

    public function getClientTimestamp(): string
    {
        return $this->clientTimestamp;
    }

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
           'data' => $this->getData()->toArray(),
           'client_timestamp' => $this->getClientTimestamp(),
        ];
    }
}
