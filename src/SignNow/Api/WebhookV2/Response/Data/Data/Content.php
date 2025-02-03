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

namespace SignNow\Api\WebhookV2\Response\Data\Data;

readonly class Content
{
    public function __construct(
        private string $documentId,
        private string $documentName,
        private string $userId,
        private string $viewerUserUniqueId,
    ) {
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getViewerUserUniqueId(): string
    {
        return $this->viewerUserUniqueId;
    }

    public function toArray(): array
    {
        return [
           'document_id' => $this->getDocumentId(),
           'document_name' => $this->getDocumentName(),
           'user_id' => $this->getUserId(),
           'viewer_user_unique_id' => $this->getViewerUserUniqueId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['document_id'],
            $data['document_name'],
            $data['user_id'],
            $data['viewer_user_unique_id'],
        );
    }
}
