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

namespace SignNow\Api\Template\Request;

use SplFileInfo;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'bulkInvite',
    url: '/template/{document_id}/bulkinvite',
    method: 'post',
    auth: 'bearer',
    namespace: 'template',
    entity: 'bulkInvite',
    type: 'multipart/form-data',
)]
final class BulkInvitePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private SplFileInfo $file,
        private string $folderId,
        private int $clientTimestamp = 0,
        private string $documentName = '',
        private string $subject = '',
        private string $emailMessage = '',
    ) {
    }

    public function getFile(): SplFileInfo
    {
        return $this->file;
    }

    public function getFolderId(): string
    {
        return $this->folderId;
    }

    public function getClientTimestamp(): int
    {
        return $this->clientTimestamp;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getEmailMessage(): string
    {
        return $this->emailMessage;
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
           'file' => $this->getFile(),
           'folder_id' => $this->getFolderId(),
           'client_timestamp' => $this->getClientTimestamp(),
           'document_name' => $this->getDocumentName(),
           'subject' => $this->getSubject(),
           'email_message' => $this->getEmailMessage(),
        ];
    }
}
