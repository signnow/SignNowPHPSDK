<?php

declare(strict_types=1);

namespace SignNow\Api\Action\EventSubscription\V2;

use ReflectionException;
use SignNow\Api\Action\Data\EventSubscription\V2\ActionsList;
use SignNow\Api\Entity\EventSubscription\V2\CreateEventSubscription;
use SignNow\Api\Entity\EventSubscription\V2\DeleteEventSubscription;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class EventSubscriptionBearerToken
 *
 * @package SignNow\Api\Action\EventSubscription\V2
 */
class EventSubscriptionBearerToken
{
    /**
     * @var EntityManager
     */
    private $bearerEntityManager;

    /**
     * EventSubscriptionBearerToken constructor.
     *
     * @param EntityManager $bearerEntityManager
     */
    public function __construct(EntityManager $bearerEntityManager)
    {
        $this->bearerEntityManager = $bearerEntityManager;
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

        $this->bearerEntityManager->create($entity);
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
        $this->bearerEntityManager->delete(
            new DeleteEventSubscription(),
            [
                'eventSubscriptionUniqueId' => $subscriptionUniqueId,
            ]
        );
    }
}
