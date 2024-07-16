<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Response\Data\Data;

readonly class Data
{
    public function __construct(
        private string $id,
        private string $applicationName,
        private string $entityId,
        private string $eventSubscriptionId,
        private bool $eventSubscriptionActive,
        private string $eventName,
        private string $callbackUrl,
        private string $requestMethod,
        private int $requestStartTime,
        private int $requestEndTime,
        private float $duration,
        private RequestContent $requestContent,
        private string $responseContent,
        private int $responseStatusCode,
        private ?string $eventType = null,
        private ?RequestHeader $requestHeaders = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getApplicationName(): string
    {
        return $this->applicationName;
    }

    public function getEntityId(): string
    {
        return $this->entityId;
    }

    public function getEventSubscriptionId(): string
    {
        return $this->eventSubscriptionId;
    }

    public function isEventSubscriptionActive(): bool
    {
        return $this->eventSubscriptionActive;
    }

    public function getEventName(): string
    {
        return $this->eventName;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    public function getRequestStartTime(): int
    {
        return $this->requestStartTime;
    }

    public function getRequestEndTime(): int
    {
        return $this->requestEndTime;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function getRequestHeaders(): ?RequestHeader
    {
        return $this->requestHeaders;
    }

    public function getRequestContent(): RequestContent
    {
        return $this->requestContent;
    }

    public function getResponseContent(): string
    {
        return $this->responseContent;
    }

    public function getResponseStatusCode(): int
    {
        return $this->responseStatusCode;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'application_name' => $this->getApplicationName(),
           'entity_id' => $this->getEntityId(),
           'event_subscription_id' => $this->getEventSubscriptionId(),
           'event_subscription_active' => $this->isEventSubscriptionActive(),
           'event_name' => $this->getEventName(),
           'event_type' => $this->getEventType(),
           'callback_url' => $this->getCallbackUrl(),
           'request_method' => $this->getRequestMethod(),
           'request_start_time' => $this->getRequestStartTime(),
           'request_end_time' => $this->getRequestEndTime(),
           'duration' => $this->getDuration(),
           'request_headers' => $this->getRequestHeaders(),
           'request_content' => $this->getRequestContent(),
           'response_content' => $this->getResponseContent(),
           'response_status_code' => $this->getResponseStatusCode(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['application_name'],
            $data['entity_id'],
            $data['event_subscription_id'],
            $data['event_subscription_active'],
            $data['event_name'],
            $data['callback_url'],
            $data['request_method'],
            $data['request_start_time'],
            $data['request_end_time'],
            $data['duration'],
            RequestContent::fromArray($data['request_content']),
            $data['response_content'],
            $data['response_status_code'],
            $data['event_type'] ?? null,
            isset($data['request_headers']) ? RequestHeader::fromArray($data['request_headers']) : null,
        );
    }
}
