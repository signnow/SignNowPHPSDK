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

namespace SignNow\Api\EmbeddedInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'deleteEmbeddedInvite',
    url: '/v2/documents/{document_id}/embedded-invites',
    method: 'delete',
    auth: 'bearer',
    namespace: 'embeddedInvite',
    entity: 'documentInvite',
    type: 'application/json',
)]
final class DocumentInviteDelete implements RequestInterface
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
