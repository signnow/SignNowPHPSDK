<?php
declare(strict_types=1);

namespace SignNow\Api\Action\EventSubscription\V2;

use ReflectionException;
use SignNow\Api\Action\Data\EventSubscription\V2\ActionsList;
use SignNow\Api\Entity\EventSubscription\V2\CreateEventSubscription;
use SignNow\Api\Entity\EventSubscription\V2\DeleteEventSubscription;
use SignNow\Api\Entity\EventSubscription\V2\EventCollection;
use SignNow\Api\Entity\EventSubscription\V2\GetEventSubscriptions;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class EventSubscriptionBasicToken
 *
 * @package SignNow\Api\Action\EventSubscription\V2
 */
class EventSubscriptionBasicToken
{
    /**
     * @var EntityManager
     */
    private $basicEntityManager;

    /**
     * EventSubscriptionBasicToken constructor.
     *
     * @param EntityManager $basicEntityManager
     */
    public function __construct(EntityManager $basicEntityManager)
    {
        $this->basicEntityManager = $basicEntityManager;
    }

    /**
     * @param string      $eventName see SignNow\Api\Action\Data\EventSubscription\V2\EventsList::class
     * @param string      $entityUniqueId
     * @param string      $callbackUrl
     * @param string|null $integrationUniqueId
     * @param bool        $useTls12
     * @param bool        $useDocidQueryParam
     *
     * @return void
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(
        string $eventName,
        string $entityUniqueId,
        string $callbackUrl,
        ?string $integrationUniqueId = null,
        bool $useTls12 = true,
        bool $useDocidQueryParam = false
    ): void {
        $entity =  (new CreateEventSubscription())
            ->setEvent($eventName)
            ->setEntityId($entityUniqueId)
            ->setAction(ActionsList::CALLBACK)
            ->setUseTls12($useTls12)
            ->setUseDocidQueryParam($useDocidQueryParam)
            ->setCallbackUrl($callbackUrl);

        if ($integrationUniqueId !== null) {
            $entity->setIntegrationId($integrationUniqueId);
        }

        $this->basicEntityManager->create($entity);
    }

    /**
     * @return object|EventCollection
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function get(): EventCollection
    {
        return $this->basicEntityManager->get(new GetEventSubscriptions());
    }

    /**
     * @param string $subscriptionUniqueId
     *
     * @return void
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function delete(string $subscriptionUniqueId): void
    {
        $this->basicEntityManager->delete(
            new DeleteEventSubscription(),
            [
                'eventSubscriptionUniqueId' => $subscriptionUniqueId,
            ]
        );
    }
}
