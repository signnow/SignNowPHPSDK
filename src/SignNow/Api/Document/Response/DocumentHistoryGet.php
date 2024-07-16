<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response;

use SignNow\Api\Document\Response\Data\JsonAttribute;

readonly class DocumentHistoryGet
{
    public function __construct(
        private string $uniqueId,
        private string $userId,
        private string $documentId,
        private string $clientAppName,
        private string $ipAddress,
        private string $email,
        private JsonAttribute $jsonAttributes,
        private int $created,
        private string $event,
        private string $fieldId = '',
        private string $elementId = '',
        private int $clientTimestamp = 0,
        private string $origin = '',
    ) {
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getClientAppName(): string
    {
        return $this->clientAppName;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    public function getElementId(): string
    {
        return $this->elementId;
    }

    public function getJsonAttributes(): JsonAttribute
    {
        return $this->jsonAttributes;
    }

    public function getClientTimestamp(): int
    {
        return $this->clientTimestamp;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function getEvent(): string
    {
        return $this->event;
    }
}
