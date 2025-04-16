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

namespace SignNow\Api\Document\Response\Data\Request;

readonly class Request
{
    public function __construct(
        private string $id,
        private string $uniqueId,
        private string $userId,
        private string $created,
        private ?string $originatorEmail,
        private ?string $signerEmail,
        private string $redirectTarget,
        private ?string $signatureId = null,
        private ?string $signerUserId = null,
        private ?bool $canceled = null,
        private ?string $redirectUri = null,
        private ?string $closeRedirectUri = null,
        private ?string $language = null,
        private EmailstatusCollection $emailStatuses = new EmailstatusCollection(),
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getSignatureId(): ?string
    {
        return $this->signatureId;
    }

    public function getSignerUserId(): ?string
    {
        return $this->signerUserId;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getOriginatorEmail(): ?string
    {
        return $this->originatorEmail;
    }

    public function getSignerEmail(): ?string
    {
        return $this->signerEmail;
    }

    public function canceled(): ?bool
    {
        return $this->canceled;
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

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getEmailStatuses(): EmailstatusCollection
    {
        return $this->emailStatuses;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'unique_id' => $this->getUniqueId(),
           'user_id' => $this->getUserId(),
           'signature_id' => $this->getSignatureId(),
           'signer_user_id' => $this->getSignerUserId(),
           'created' => $this->getCreated(),
           'originator_email' => $this->getOriginatorEmail(),
           'signer_email' => $this->getSignerEmail(),
           'canceled' => $this->Canceled(),
           'redirect_uri' => $this->getRedirectUri(),
           'close_redirect_uri' => $this->getCloseRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'language' => $this->getLanguage(),
           'email_statuses' => !is_null($this->getEmailStatuses()) ? $this->getEmailStatuses()->toArray() : null,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['unique_id'],
            $data['user_id'],
            $data['created'],
            $data['originator_email'],
            $data['signer_email'],
            $data['redirect_target'],
            $data['signature_id'] ?? null,
            $data['signer_user_id'] ?? null,
            $data['canceled'] ?? null,
            $data['redirect_uri'] ?? null,
            $data['close_redirect_uri'] ?? null,
            $data['language'] ?? null,
            new EmailstatusCollection($data['email_statuses']),
        );
    }
}
