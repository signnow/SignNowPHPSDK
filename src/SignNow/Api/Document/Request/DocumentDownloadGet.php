<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Api\Document\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'downloadDocument',
    url: '/document/{document_id}/download',
    method: 'get',
    auth: 'bearer',
    namespace: 'document',
    entity: 'documentDownload',
    type: 'application/pdf',
)]
final class DocumentDownloadGet implements RequestInterface
{
    private array $uriParams = [];
    private array $queryParams = [];

    public function withDocumentId(string $documentId): self
    {
        $this->uriParams['document_id'] = $documentId;

        return $this;
    }

    public function withType(string $type): self
    {
        $this->queryParams['type'] = $type;

        return $this;
    }

    public function withHistory(string $withHistory): self
    {
        $this->queryParams['with_history'] = $withHistory;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function queryParams(): array
    {
        return $this->queryParams;
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
