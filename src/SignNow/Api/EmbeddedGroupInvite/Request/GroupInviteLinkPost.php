<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createLinkForEmbeddedInviteDocumentGroup',
    url: '/v2/document-groups/{document_group_id}/embedded-invites/{embedded_invite_id}/link',
    method: 'post',
    auth: 'bearer',
    namespace: 'embeddedGroupInvite',
    entity: 'groupInviteLink',
    type: 'application/json',
)]
final class GroupInviteLinkPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $email = '',
        private string $authMethod = '',
        private int $linkExpiration = 0,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    public function getLinkExpiration(): int
    {
        return $this->linkExpiration;
    }

    public function withDocumentGroupId(string $documentGroupId): self
    {
        $this->uriParams['document_group_id'] = $documentGroupId;

        return $this;
    }

    public function withEmbeddedInviteId(string $embeddedInviteId): self
    {
        $this->uriParams['embedded_invite_id'] = $embeddedInviteId;

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
           'auth_method' => $this->getAuthMethod(),
           'link_expiration' => $this->getLinkExpiration(),
        ];
    }
}
