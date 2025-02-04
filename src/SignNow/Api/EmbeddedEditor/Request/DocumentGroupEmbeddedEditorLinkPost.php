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

namespace SignNow\Api\EmbeddedEditor\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createDocumentGroupEmbeddedEditorLink',
    url: '/v2/document-groups/{document_group_id}/embedded-editor',
    method: 'post',
    auth: 'bearer',
    namespace: 'embeddedEditor',
    entity: 'documentGroupEmbeddedEditorLink',
    type: 'application/json',
)]
final class DocumentGroupEmbeddedEditorLinkPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $redirectUri = '',
        private string $redirectTarget = '',
        private int $linkExpiration = 0,
    ) {
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
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

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'redirect_uri' => $this->getRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'link_expiration' => $this->getLinkExpiration(),
        ];
    }
}
