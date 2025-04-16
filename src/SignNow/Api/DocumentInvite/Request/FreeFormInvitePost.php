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

namespace SignNow\Api\DocumentInvite\Request;

use SignNow\Api\DocumentInvite\Request\Data\CcCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createFreeFormInvite',
    url: '/document/{document_id}/invite',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentInvite',
    entity: 'freeFormInvite',
    type: 'application/json',
)]
final class FreeFormInvitePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $to,
        private ?string $from = null,
        private CcCollection $cc = new CcCollection(),
        private ?string $subject = null,
        private ?string $message = null,
        private ?string $ccSubject = null,
        private ?string $ccMessage = null,
        private ?string $language = null,
        private ?int $clientTimestamp = null,
        private ?string $callbackUrl = null,
        private ?bool $isFirstInviteInSequence = null,
        private ?string $redirectUri = null,
        private ?string $closeRedirectUri = null,
        private string $redirectTarget = '',
    ) {
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getFrom(): ?string
    {
        return $this->from;
    }

    public function getCc(): CcCollection
    {
        return $this->cc;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getCcSubject(): ?string
    {
        return $this->ccSubject;
    }

    public function getCcMessage(): ?string
    {
        return $this->ccMessage;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getClientTimestamp(): ?int
    {
        return $this->clientTimestamp;
    }

    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }

    public function isFirstInviteInSequence(): ?bool
    {
        return $this->isFirstInviteInSequence;
    }

    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    public function getCloseRedirectUri(): ?string
    {
        return $this->closeRedirectUri;
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
           'to' => $this->getTo(),
           'from' => $this->getFrom(),
           'cc' => !is_null($this->getCc()) ? $this->getCc()->toArray() : null,
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
           'cc_subject' => $this->getCcSubject(),
           'cc_message' => $this->getCcMessage(),
           'language' => $this->getLanguage(),
           'client_timestamp' => $this->getClientTimestamp(),
           'callback_url' => $this->getCallbackUrl(),
           'is_first_invite_in_sequence' => $this->IsFirstInviteInSequence(),
           'redirect_uri' => $this->getRedirectUri(),
           'close_redirect_uri' => $this->getCloseRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
        ];
    }
}
