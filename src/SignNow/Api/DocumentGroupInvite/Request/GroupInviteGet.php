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

namespace SignNow\Api\DocumentGroupInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getDocumentGroupInvite',
    url: '/documentgroup/{document_group_id}/groupinvite/{invite_id}',
    method: 'get',
    auth: 'bearer',
    namespace: 'documentGroupInvite',
    entity: 'groupInvite',
    type: 'application/json',
)]
final class GroupInviteGet implements RequestInterface
{
    private array $uriParams = [];


    public function withDocumentGroupId(string $documentGroupId): self
    {
        $this->uriParams['document_group_id'] = $documentGroupId;

        return $this;
    }

    public function withInviteId(string $inviteId): self
    {
        $this->uriParams['invite_id'] = $inviteId;

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
