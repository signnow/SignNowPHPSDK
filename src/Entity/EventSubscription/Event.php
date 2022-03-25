<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Event
 *
 * @package SignNow\Api\Entity\EventSubscription
 */
class Event
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $event;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $callbackUrl;

    /**
     * @var int
     * @Serializer\Type("int")
     */
    private $created;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    private $attributes;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }
}
