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

namespace SignNow\Api\EmbeddedSending\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createDocumentGroupEmbeddedSendingLink',
    url: '/v2/document-groups/{document_group_id}/embedded-sending',
    method: 'post',
    auth: 'bearer',
    namespace: 'embeddedSending',
    entity: 'documentGroupEmbeddedSendingLink',
    type: 'application/json',
)]
final class DocumentGroupEmbeddedSendingLinkPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $redirectUri = '',
        private int $linkExpiration = 0,
        private string $redirectTarget = '',
        private string $type = 'manage',
    ) {
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function getLinkExpiration(): int
    {
        return $this->linkExpiration;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
    }

    public function getType(): string
    {
        return $this->type;
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
           'redirect_uri' => $this->getRedirectUri(),
           'link_expiration' => $this->getLinkExpiration(),
           'redirect_target' => $this->getRedirectTarget(),
           'type' => $this->getType(),
        ];
    }
}
