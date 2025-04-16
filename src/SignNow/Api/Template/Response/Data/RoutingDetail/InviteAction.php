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

namespace SignNow\Api\Template\Response\Data\RoutingDetail;

readonly class InviteAction
{
    public function __construct(
        private string $email,
        private string $documentId,
        private string $documentName,
        private int $allowReassign,
        private int $declineBySignature,
        private bool $lock,
        private string $action,
        private string $roleName,
        private ?Authentication $authentication = null,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getAuthentication(): ?Authentication
    {
        return $this->authentication;
    }

    public function getAllowReassign(): int
    {
        return $this->allowReassign;
    }

    public function getDeclineBySignature(): int
    {
        return $this->declineBySignature;
    }

    public function isLock(): bool
    {
        return $this->lock;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'document_id' => $this->getDocumentId(),
           'document_name' => $this->getDocumentName(),
           'authentication' => !is_null($this->getAuthentication()) ? $this->getAuthentication()->toArray() : null,
           'allow_reassign' => $this->getAllowReassign(),
           'decline_by_signature' => $this->getDeclineBySignature(),
           'lock' => $this->isLock(),
           'action' => $this->getAction(),
           'role_name' => $this->getRoleName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['document_id'],
            $data['document_name'],
            $data['allow_reassign'],
            $data['decline_by_signature'],
            $data['lock'],
            $data['action'],
            $data['role_name'],
            isset($data['authentication']) ? Authentication::fromArray($data['authentication']) : null,
        );
    }
}
