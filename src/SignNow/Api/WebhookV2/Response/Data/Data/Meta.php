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

readonly class Meta
{
    public function __construct(
        private int $timestamp,
        private string $event,
        private string $environment,
        private string $callbackUrl,
        private string $initiatorId,
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

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getInitiatorId(): string
    {
        return $this->initiatorId;
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
           'callback_url' => $this->getCallbackUrl(),
           'initiator_id' => $this->getInitiatorId(),
           'access_token' => $this->getAccessToken(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['timestamp'],
            $data['event'],
            $data['environment'],
            $data['callback_url'],
            $data['initiator_id'],
            $data['access_token'],
        );
    }
}
