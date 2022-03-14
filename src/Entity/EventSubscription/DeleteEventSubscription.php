<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription;

use SignNow\Rest\Entity\Entity;
use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class DeleteEventSubscription
 *
 * @HttpEntity("event_subscription/{uniqueId}", idProperty="")
 *
 * @package SignNow\Api\Entity\EventSubscription
 */
class DeleteEventSubscription extends Entity
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
    private $status;

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
    public function getStatus(): string
    {
        return $this->status;
    }
}
