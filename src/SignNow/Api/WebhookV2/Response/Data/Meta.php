<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Response\Data;

readonly class Meta
{
    public function __construct(
        private int $timestamp,
        private string $event,
        private string $environment,
        private string $initiatorId,
        private string $callbackUrl,
        private string $accessToken,
    ) {
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function getInitiatorId(): string
    {
        return $this->initiatorId;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function toArray(): array
    {
        return [
           'timestamp' => $this->getTimestamp(),
           'event' => $this->getEvent(),
           'environment' => $this->getEnvironment(),
           'initiator_id' => $this->getInitiatorId(),
           'callback_url' => $this->getCallbackUrl(),
           'access_token' => $this->getAccessToken(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['timestamp'],
            $data['event'],
            $data['environment'],
            $data['initiator_id'],
            $data['callback_url'],
            $data['access_token'],
        );
    }
}
