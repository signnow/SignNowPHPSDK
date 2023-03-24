<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class RoutingDetail
 *
 * @package SignNow\Api\Entity\Document
 */
class RoutingDetail
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $data = [];

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $created;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $updated;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $cc = [];

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $ccStep = [];

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $inviteLinkInstructions;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $viewers = [];

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
     * @return RoutingDetail
     */
    public function setId(string $id): RoutingDetail
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return RoutingDetail
     */
    public function setData(array $data): RoutingDetail
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string $created
     *
     * @return RoutingDetail
     */
    public function setCreated(string $created): RoutingDetail
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    /**
     * @param string $updated
     *
     * @return RoutingDetail
     */
    public function setUpdated(string $updated): RoutingDetail
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return array
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    /**
     * @param array $cc
     *
     * @return RoutingDetail
     */
    public function setCc(array $cc): RoutingDetail
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return array
     */
    public function getCcStep(): array
    {
        return $this->ccStep;
    }

    /**
     * @param array $ccStep
     *
     * @return RoutingDetail
     */
    public function setCcStep(array $ccStep): RoutingDetail
    {
        $this->ccStep = $ccStep;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getInviteLinkInstructions(): ?string
    {
        return $this->inviteLinkInstructions;
    }

    /**
     * @param array $inviteLinkInstructions
     *
     * @return RoutingDetail
     */
    public function setInviteLinkInstructions(array $inviteLinkInstructions): RoutingDetail
    {
        $this->inviteLinkInstructions = $inviteLinkInstructions;

        return $this;
    }

    /**
     * @return array
     */
    public function getViewers(): array
    {
        return $this->viewers;
    }

    /**
     * @param array $viewers
     *
     * @return RoutingDetail
     */
    public function setViewers(array $viewers): RoutingDetail
    {
        $this->viewers = $viewers;

        return $this;
    }
}
