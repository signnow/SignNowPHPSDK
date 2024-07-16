<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Integration
{
    public function __construct(
        private string $id,
        private ?string $integrationId = null,
        private string $data = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'integration_id' => $this->getIntegrationId(),
           'data' => $this->getData(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['integration_id'] ?? null,
            $data['data'] ?? '',
        );
    }
}
