<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'cancelDocumentGroupInvite',
    url: '/documentgroup/{document_group_id}/groupinvite/{invite_id}/cancelinvite',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroupInvite',
    entity: 'cancelGroupInvite',
    type: 'application/json',
)]
final class CancelGroupInvitePost implements RequestInterface
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
