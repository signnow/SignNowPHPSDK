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

namespace SignNow\Api\Webhook\Response\Data\Data;

use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class JsonAttribute
{
    public function __construct(
        #[SerializedName('use_tls_12')]
        private bool $useTls12,
        private bool $docidQueryparam,
        private string $callbackUrl,
        private ?string $integrationId = null,
        private ?Header $headers = null,
        private string $secretKey = '',
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

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function toArray(): array
    {
        return [
           'use_tls_12' => $this->isUseTls12(),
           'docid_queryparam' => $this->isDocidQueryparam(),
           'integration_id' => $this->getIntegrationId(),
           'callback_url' => $this->getCallbackUrl(),
           'headers' => $this->getHeaders(),
           'secret_key' => $this->getSecretKey(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['use_tls_12'],
            $data['docid_queryparam'],
            $data['callback_url'],
            $data['integration_id'] ?? null,
            isset($data['headers']) ? Header::fromArray($data['headers']) : null,
            $data['secret_key'] ?? '',
        );
    }
}
