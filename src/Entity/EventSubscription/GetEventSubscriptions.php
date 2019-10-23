<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\EventSubscription;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class GetEventSubscriptions
 *
 * @HttpEntity("event_subscription", idProperty="")
 *
 * @package SignNow\Api\Entity\EventSubscription
 */
class GetEventSubscriptions extends Entity
{
    /**
     * @var array|Event[]
     * @Serializer\Type("array<SignNow\Api\Entity\EventSubscription\Event>")
     */
    private $subscriptions;
    
    /**
     * @return array|Event[]
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }
}
