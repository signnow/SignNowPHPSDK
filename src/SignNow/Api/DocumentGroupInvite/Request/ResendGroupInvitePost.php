<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'resendDocumentGroupInvite',
    url: '/documentgroup/{document_group_id}/groupinvite/{invite_id}/resendinvites',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroupInvite',
    entity: 'resendGroupInvite',
    type: 'application/json',
)]
final class ResendGroupInvitePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $email = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

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
           'email' => $this->getEmail(),
        ];
    }
}
