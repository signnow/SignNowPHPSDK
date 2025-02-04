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

readonly class DataEventSubscription
{
    public function __construct(
        private string $id,
        private string $event,
        private int $entityId,
        private bool $active,
        private JsonAttribute $jsonAttributes,
        private int $created,
        private int $version,
        private ?string $entityUniqueId = null,
        private ?string $applicationName = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getEntityId(): int
    {
        return $this->entityId;
    }

    public function getEntityUniqueId(): ?string
    {
        return $this->entityUniqueId;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getJsonAttributes(): JsonAttribute
    {
        return $this->jsonAttributes;
    }

    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'event' => $this->getEvent(),
           'entity_id' => $this->getEntityId(),
           'entity_unique_id' => $this->getEntityUniqueId(),
           'active' => $this->isActive(),
           'json_attributes' => $this->getJsonAttributes(),
           'application_name' => $this->getApplicationName(),
           'created' => $this->getCreated(),
           'version' => $this->getVersion(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['event'],
            $data['entity_id'],
            $data['active'],
            JsonAttribute::fromArray($data['json_attributes']),
            $data['created'],
            $data['version'],
            $data['entity_unique_id'] ?? null,
            $data['application_name'] ?? null,
        );
    }
}
