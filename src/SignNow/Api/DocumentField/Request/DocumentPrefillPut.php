<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentField\Request;

use SignNow\Api\DocumentField\Request\Data\FieldCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'prefillTextFields',
    url: '/v2/documents/{document_id}/prefill-texts',
    method: 'put',
    auth: 'bearer',
    namespace: 'documentField',
    entity: 'documentPrefill',
    type: 'application/json',
)]
final class DocumentPrefillPut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private FieldCollection $fields,
    ) {
    }

    public function getFields(): FieldCollection
    {
        return $this->fields;
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
           'fields' => $this->getFields()->toArray(),
        ];
    }
}
