<?php
declare(strict_types = 1);

namespace Examples\EventSubscription;

use Examples\BaseExample;
use ReflectionException;
use SignNow\Api\Entity\EventSubscription\GetEventSubscriptions;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class GetEventSubscriptionsExample
 *
 * @package Examples\EventSubscription
 */
class GetUserEventSubscriptionsExample extends BaseExample
{
    /**
     * @return GetEventSubscriptions|object
     *
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function execute(): GetEventSubscriptions
    {
        return $this->entityManager->get(new GetEventSubscriptions());
    }
}
