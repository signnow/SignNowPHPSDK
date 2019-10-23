<?php
declare(strict_types = 1);

namespace Examples\EventSubscription;

use Examples\BaseExample;
use ReflectionException;
use SignNow\Api\Entity\EventSubscription\DeleteEventSubscription;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class DeleteUserEventSubscriptionExample
 *
 * @package Examples\EventSubscription
 */
class DeleteUserEventSubscriptionExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["userEventUniqueId:"];
    
    /**
     * @return DeleteEventSubscription|object
     *
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function execute(): DeleteEventSubscription
    {
        return $this->entityManager->delete(
            new DeleteEventSubscription(),
            ['uniqueId' => $this->arguments['userEventUniqueId']]
        );
    }
}
