<?php
declare(strict_types = 1);

namespace Examples\EventSubscription;

use Examples\BaseExample;
use ReflectionException;
use SignNow\Api\Entity\EventSubscription\CreateEventSubscription;
use SignNow\Api\Entity\EventSubscription\EventSubscriptionResponse;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class CreateUserEventSubscriptionExample
 *
 * @package Examples\EventSubscription
 */
class CreateUserEventSubscriptionExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["event:", "callbackUrl:"];
    
    /**
     * @var array
     */
    protected $additionalParameters = ["useTls12:", "integrationId:", "docidQueryparam:"];
    
    /**
     * @return EventSubscriptionResponse|object
     *
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function execute(): EventSubscriptionResponse
    {
        return $this->entityManager->create(
            (new CreateEventSubscription())
            ->setEvent($this->arguments['event'])
            ->setCallbackUrl($this->arguments['callbackUrl'])
            ->setUseTls12($this->arguments['useTls12'])
            ->setIntegrationId($this->arguments['integrationId'])
            ->setDocidQueryparam($this->arguments['docidQueryparam'])
        );
    }
}
