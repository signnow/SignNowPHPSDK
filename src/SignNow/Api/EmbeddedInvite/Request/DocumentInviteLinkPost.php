<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createLinkForEmbeddedInvite',
    url: '/v2/documents/{document_id}/embedded-invites/{field_invite_id}/link',
    method: 'post',
    auth: 'bearer',
    namespace: 'embeddedInvite',
    entity: 'documentInviteLink',
    type: 'application/json',
)]
final class DocumentInviteLinkPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $authMethod = '',
        private int $linkExpiration = 0,
    ) {
    }

    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    public function getLinkExpiration(): int
    {
        return $this->linkExpiration;
    }

    public function withDocumentId(string $documentId): self
    {
        $this->uriParams['document_id'] = $documentId;

        return $this;
    }

    public function withFieldInviteId(string $fieldInviteId): self
    {
        $this->uriParams['field_invite_id'] = $fieldInviteId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'auth_method' => $this->getAuthMethod(),
           'link_expiration' => $this->getLinkExpiration(),
        ];
    }
}
