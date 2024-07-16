<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Response\Data\Data;

use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class JsonAttribute
{
    public function __construct(
        #[SerializedName('use_tls_12')]
        private bool $useTls12,
        private string $callbackUrl,
        private bool $docidQueryparam = false,
        private ?string $integrationId = null,
        private ?Header $headers = null,
        private bool $includeMetadata = false,
        private bool $deleteAccessToken = false,
    ) {
    }

    public function isUseTls12(): bool
    {
        return $this->useTls12;
    }

    public function isDocidQueryparam(): bool
    {
        return $this->docidQueryparam;
    }

    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getHeaders(): ?Header
    {
        return $this->headers;
    }

    public function isIncludeMetadata(): bool
    {
        return $this->includeMetadata;
    }

    public function isDeleteAccessToken(): bool
    {
        return $this->deleteAccessToken;
    }

    public function toArray(): array
    {
        return [
           'use_tls_12' => $this->isUseTls12(),
           'docid_queryparam' => $this->isDocidQueryparam(),
           'integration_id' => $this->getIntegrationId(),
           'callback_url' => $this->getCallbackUrl(),
           'headers' => $this->getHeaders(),
           'include_metadata' => $this->isIncludeMetadata(),
           'delete_access_token' => $this->isDeleteAccessToken(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['use_tls_12'],
            $data['callback_url'],
            $data['docid_queryparam'] ?? false,
            $data['integration_id'] ?? null,
            isset($data['headers']) ? Header::fromArray($data['headers']) : null,
            $data['include_metadata'] ?? false,
            $data['delete_access_token'] ?? false,
        );
    }
}
