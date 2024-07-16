<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Response\Data\Data;

readonly class DataSubscription
{
    public function __construct(
        private string $id,
        private string $event,
        private int $entityId,
        private string $action,
        private JsonAttribute $jsonAttributes,
        private int $created,
        private ?Content $content = null,
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

    public function getAction(): string
    {
        return $this->action;
    }

    public function getJsonAttributes(): JsonAttribute
    {
        return $this->jsonAttributes;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getContent(): ?Content
    {
        return $this->content;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'event' => $this->getEvent(),
           'entity_id' => $this->getEntityId(),
           'action' => $this->getAction(),
           'json_attributes' => $this->getJsonAttributes(),
           'created' => $this->getCreated(),
           'content' => $this->getContent(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['event'],
            $data['entity_id'],
            $data['action'],
            JsonAttribute::fromArray($data['json_attributes']),
            $data['created'],
            isset($data['content']) ? Content::fromArray($data['content']) : null,
        );
    }
}
