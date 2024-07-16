<?php

declare(strict_types=1);

namespace SignNow\Api\Webhook\Request\Data;

use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class Attribute
{
    public function __construct(
        private string $callback,
        #[SerializedName('use_tls_12')]
        private bool $useTls12 = false,
        private string $integrationId = '',
        private bool $docidQueryparam = false,
        private ?Header $headers = null,
    ) {
    }

    public function getCallback(): string
    {
        return $this->callback;
    }

    public function isUseTls12(): bool
    {
        return $this->useTls12;
    }

    public function getIntegrationId(): string
    {
        return $this->integrationId;
    }

    public function isDocidQueryparam(): bool
    {
        return $this->docidQueryparam;
    }

    public function getHeaders(): ?Header
    {
        return $this->headers;
    }

    public function toArray(): array
    {
        return [
           'callback' => $this->getCallback(),
           'use_tls_12' => $this->isUseTls12(),
           'integration_id' => $this->getIntegrationId(),
           'docid_queryparam' => $this->isDocidQueryparam(),
           'headers' => $this->getHeaders(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['callback'],
            $data['use_tls_12'] ?? false,
            $data['integration_id'] ?? '',
            $data['docid_queryparam'] ?? false,
            isset($data['headers']) ? Header::fromArray($data['headers']) : null,
        );
    }
}
