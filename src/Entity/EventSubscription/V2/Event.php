<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription\V2;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Event
 *
 * @package SignNow\Api\Entity\EventSubscription\V2
 */
class Event
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var null|string
     * @Serializer\Type("string")
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
     */
    private $entityUniqueId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $action;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $jsonAttributes = [];

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $applicationName;

    /**
     * @var null|int
     * @Serializer\Type("integer")
     */
    private $created;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Event
     */
    public function setId(string $id): Event
    {
        $this->id = $id;

        return $this;
    }

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
     * @return Event
     */
    public function setEvent(string $event): Event
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
     * @return Event
     */
    public function setEntityId(string $entityId): Event
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEntityUniqueId(): ?string
    {
        return $this->entityUniqueId;
    }

    /**
     * @param string $entityUniqueId
     *
     * @return Event
     */
    public function setEntityUniqueId(string $entityUniqueId): Event
    {
        $this->entityUniqueId = $entityUniqueId;

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
     * @return Event
     */
    public function setAction(string $action): Event
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return array
     */
    public function getJsonAttributes(): array
    {
        return $this->jsonAttributes;
    }

    /**
     * @param string|array $jsonAttributes
     *
     * @return Event
     */
    public function setJsonAttributes($jsonAttributes): Event
    {
        $jsonAttributes = $jsonAttributes ?? [];
        
        $this->jsonAttributes = is_string($jsonAttributes) ? json_decode($jsonAttributes, true) : $jsonAttributes;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     *
     * @return Event
     */
    public function setApplicationName(string $applicationName): Event
    {
        $this->applicationName = $applicationName;

        return $this;
    }

    /**
     * @return null|int
     */
    public function getCreated(): ?int
    {
        return $this->created;
    }

    /**
     * @param int $created
     *
     * @return Event
     */
    public function setCreated(int $created): Event
    {
        $this->created = $created;

        return $this;
    }
}
