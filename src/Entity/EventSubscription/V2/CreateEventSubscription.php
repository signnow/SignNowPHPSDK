<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription\V2;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Action\Data\EventSubscription\V2\ActionsList;
use SignNow\Api\Action\Data\EventSubscription\V2\EventsList;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class CreateEventSubscription
 *
 * @HttpEntity("api/v2/events", idProperty="")
 *
 * @package SignNow\Api\Entity\EventSubscription\V2
 */
class CreateEventSubscription extends Entity
{
    private const CALLBACK_ATTRIBUTE = 'callback';
    private const USE_TLS_12_ATTRIBUTE = 'use_tls_12';
    private const DOCID_QUERYPARAM_ATTRIBUTE = 'docid_queryparam';
    private const INTEGRATION_ID_ATTRIBUTE = 'integration_id';
    private const HEADERS_ATTRIBUTE = 'headers';

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @see EventsList
     */
    private $event;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $entityId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @see ActionsList
     */
    private $action;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $attributes = [];

    /**
     * @return null|string
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }

    /**
     * @param string $event
     *
     * @return CreateEventSubscription
     */
    public function setEvent(string $event): CreateEventSubscription
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEntityId(): ?string
    {
        return $this->entityId;
    }

    /**
     * @param string $entityId
     *
     * @return CreateEventSubscription
     */
    public function setEntityId(string $entityId): CreateEventSubscription
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return CreateEventSubscription
     */
    public function setAction(string $action = ActionsList::CALLBACK): CreateEventSubscription
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return null|string
     */
    public function getCallback(): ?string
    {
        return $this->attributes[self::CALLBACK_ATTRIBUTE];
    }

    /**
     * @param string $callbackUrl
     *
     * @return CreateEventSubscription
     */
    public function setCallbackUrl(string $callbackUrl): CreateEventSubscription
    {
        $this->attributes[self::CALLBACK_ATTRIBUTE] = $callbackUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function useTls12(): bool
    {
        return $this->attributes[self::USE_TLS_12_ATTRIBUTE] ?? false;
    }

    /**
     * @param bool $useTls12
     *
     * @return $this
     */
    public function setUseTls12(bool $useTls12 = true): CreateEventSubscription
    {
        $this->attributes[self::USE_TLS_12_ATTRIBUTE] = $useTls12;

        return $this;
    }

    /**
     * @return bool
     */
    public function useDocidQueryParam(): bool
    {
        return $this->attributes[self::DOCID_QUERYPARAM_ATTRIBUTE] ?? false;
    }

    /**
     * @param bool $useDocidQueryParam
     *
     * @return CreateEventSubscription
     */
    public function setUseDocidQueryParam(bool $useDocidQueryParam = true): CreateEventSubscription
    {
        $this->attributes[self::DOCID_QUERYPARAM_ATTRIBUTE] = $useDocidQueryParam;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getIntegrationId(): ?string
    {
        return $this->attributes[self::INTEGRATION_ID_ATTRIBUTE] ?? null;
    }

    /**
     * @param string $integrationId
     *
     * @return CreateEventSubscription
     */
    public function setIntegrationId(string $integrationId): CreateEventSubscription
    {
        $this->attributes[self::INTEGRATION_ID_ATTRIBUTE] = $integrationId;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->attributes[self::HEADERS_ATTRIBUTE] ?? [];
    }

    /**
     * @param string $headerName
     * @param string $headerValue
     *
     * @return CreateEventSubscription
     */
    public function setStringHeader(string $headerName, string $headerValue): CreateEventSubscription
    {
        $this->attributes[self::HEADERS_ATTRIBUTE][$headerName] = $headerValue;

        return $this;
    }

    /**
     * @param string $headerName
     * @param int    $headerValue
     *
     * @return CreateEventSubscription
     */
    public function setIntHeader(string $headerName, int $headerValue): CreateEventSubscription
    {
        $this->attributes[self::HEADERS_ATTRIBUTE][$headerName] = $headerValue;

        return $this;
    }

    /**
     * @param string $headerName
     * @param bool   $headerValue
     *
     * @return CreateEventSubscription
     */
    public function setBooleanHeader(string $headerName, bool $headerValue): CreateEventSubscription
    {
        $this->attributes[self::HEADERS_ATTRIBUTE][$headerName] = $headerValue;

        return $this;
    }

    /**
     * @param string $headerName
     * @param float  $headerValue
     *
     * @return CreateEventSubscription
     */
    public function setFloatHeader(string $headerName, float $headerValue): CreateEventSubscription
    {
        $this->attributes[self::HEADERS_ATTRIBUTE][$headerName] = $headerValue;

        return $this;
    }
}
