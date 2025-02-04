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
    name: 'createDocumentDownloadLink',
    url: '/document/{document_id}/download/link',
    method: 'post',
    auth: 'bearer',
    namespace: 'document',
    entity: 'documentDownloadLink',
    type: 'application/json',
)]
final class DocumentDownloadLinkPost implements RequestInterface
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
