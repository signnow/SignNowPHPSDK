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

namespace SignNow\Api\EmbeddedGroupInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'deleteEmbeddedDocGroupInvites',
    url: '/v2/document-groups/{document_group_id}/embedded-invites',
    method: 'delete',
    auth: 'bearer',
    namespace: 'embeddedGroupInvite',
    entity: 'groupInvite',
    type: 'application/json',
)]
final class GroupInviteDelete implements RequestInterface
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
