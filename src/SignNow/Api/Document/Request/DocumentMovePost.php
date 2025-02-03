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
    name: 'moveDocument',
    url: '/document/{document_id}/move',
    method: 'post',
    auth: 'bearer',
    namespace: 'document',
    entity: 'documentMove',
    type: 'application/json',
)]
final class DocumentMovePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $folderId,
    ) {
    }

    public function getFolderId(): string
    {
        return $this->folderId;
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
           'folder_id' => $this->getFolderId(),
        ];
    }
}
