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

namespace SignNow\Api\WebhookV2\Request\Data;

use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class Attribute
{
    public function __construct(
        private string $callback,
        private bool $deleteAccessToken = false,
        #[SerializedName('use_tls_12')]
        private bool $useTls12 = false,
        private string $integrationId = '',
        private bool $docidQueryparam = false,
        private ?Header $headers = null,
        private bool $includeMetadata = false,
        private string $secretKey = '',
    ) {
    }

    public function isDeleteAccessToken(): bool
    {
        return $this->deleteAccessToken;
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

    public function isIncludeMetadata(): bool
    {
        return $this->includeMetadata;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function toArray(): array
    {
        return [
           'delete_access_token' => $this->isDeleteAccessToken(),
           'callback' => $this->getCallback(),
           'use_tls_12' => $this->isUseTls12(),
           'integration_id' => $this->getIntegrationId(),
           'docid_queryparam' => $this->isDocidQueryparam(),
           'headers' => $this->getHeaders(),
           'include_metadata' => $this->isIncludeMetadata(),
           'secret_key' => $this->getSecretKey(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['callback'],
            $data['delete_access_token'] ?? false,
            $data['use_tls_12'] ?? false,
            $data['integration_id'] ?? '',
            $data['docid_queryparam'] ?? false,
            isset($data['headers']) ? Header::fromArray($data['headers']) : null,
            $data['include_metadata'] ?? false,
            $data['secret_key'] ?? '',
        );
    }
}
