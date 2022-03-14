<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\EventSubscription\V2;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\EventSubscription\V2\EventSubscriptionBasicToken;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class DeleteCest
 *
 * @package SignNow\Tests\Functional\EventSubscription\V2
 */
class DeleteCest extends BaseCest
{
    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testDeleteEventSubscriptionRequestWithBasicToken(FunctionalTester $I): void
    {
        $eventSubscription = new EventSubscriptionBasicToken($this->createSignNowBasicTokenAuth($I));

        $eventSubscriptionUniqueId = $I->createUniqueId();
        $I->mockDeleteEventSubscriptionsRequestWithBasicToken($eventSubscriptionUniqueId);
        
        $eventSubscription->delete($eventSubscriptionUniqueId);
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testDeleteEventSubscriptionRequestWithBearerToken(FunctionalTester $I): void
    {
        $eventSubscription = new EventSubscriptionBasicToken($this->createSignNowBearerTokenAuth($I));
        
        $eventSubscriptionUniqueId = $I->createUniqueId();
        $I->mockDeleteEventSubscriptionsRequestWithBearerToken($eventSubscriptionUniqueId);

        $eventSubscription->delete($eventSubscriptionUniqueId);
    }
}
