<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Request;

use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\InviteCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createEmbeddedInviteForDocumentGroup',
    url: '/v2/document-groups/{document_group_id}/embedded-invites',
    method: 'post',
    auth: 'bearer',
    namespace: 'embeddedGroupInvite',
    entity: 'groupInvite',
    type: 'application/json',
)]
final class GroupInvitePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private InviteCollection $invites,
        private bool $signAsMerged,
    ) {
    }

    public function getInvites(): InviteCollection
    {
        return $this->invites;
    }

    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged;
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
           'invites' => $this->getInvites()->toArray(),
           'sign_as_merged' => $this->isSignAsMerged(),
        ];
    }
}
