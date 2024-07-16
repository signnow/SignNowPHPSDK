<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createSigningLink',
    url: '/link',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentInvite',
    entity: 'signingLink',
    type: 'application/json',
)]
final class SigningLinkPost implements RequestInterface
{
    public function __construct(
        private string $documentId,
        private string $redirectUri = '',
    ) {
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'document_id' => $this->getDocumentId(),
           'redirect_uri' => $this->getRedirectUri(),
        ];
    }
}
