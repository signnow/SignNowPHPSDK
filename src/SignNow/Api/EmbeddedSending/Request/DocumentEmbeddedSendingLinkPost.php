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
    name: 'createDocumentEmbeddedSendingLink',
    url: '/v2/documents/{document_id}/embedded-sending',
    method: 'post',
    auth: 'bearer',
    namespace: 'embeddedSending',
    entity: 'documentEmbeddedSendingLink',
    type: 'application/json',
)]
final class DocumentEmbeddedSendingLinkPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $type,
        private string $redirectUri = '',
        private int $linkExpiration = 0,
        private string $redirectTarget = '',
    ) {
    }

    public function getType(): string
    {
        return $this->type;
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
           'type' => $this->getType(),
           'redirect_uri' => $this->getRedirectUri(),
           'link_expiration' => $this->getLinkExpiration(),
           'redirect_target' => $this->getRedirectTarget(),
        ];
    }
}
