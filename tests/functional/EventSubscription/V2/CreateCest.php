<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\EventSubscription\V2;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Data\EventSubscription\V2\EventsList;
use SignNow\Api\Action\EventSubscription\V2\EventSubscriptionBasicToken;
use SignNow\Api\Action\EventSubscription\V2\EventSubscriptionBearerToken;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\EventSubscription\V2
 */
class CreateCest extends BaseCest
{
    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testCreateEventSubscriptionRequestWithBasicToken(FunctionalTester $I): void
    {
        $I->mockCreateEventSubscriptionRequestWithBasicToken();

        $eventSubscription = new EventSubscriptionBasicToken($this->createSignNowBasicTokenAuth($I));

        $eventSubscription->create(
            EventsList::DOCUMENT_DELETE,
            $I->createUniqueId(),
            'https://your.resource.com/handler'
        );
    }
    
    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testCreateEventSubscriptionWithBearerToken(FunctionalTester $I): void
    {
        $I->mockCreateEventSubscriptionRequestWithBearerToken();
        
        $eventSubscription = new EventSubscriptionBearerToken($this->createSignNowBearerTokenAuth($I));
        
        $eventSubscription->create(
            EventsList::DOCUMENT_INVITE_SENT,
            $I->createUniqueId(),
            'https://your.resource.com/handler'
        );
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testCreateEventSubscriptionWithParams(FunctionalTester $I): void
    {
        $I->mockCreateEventSubscriptionRequestWithBearerToken();

        $eventSubscription = new EventSubscriptionBearerToken($this->createSignNowBearerTokenAuth($I));

        $eventSubscription->create(
            EventsList::DOCUMENT_INVITE_SENT,
            $I->createUniqueId(),
            'https://your.resource.com/handler',
            $I->createUniqueId(),
            true,
            true
        );
    }
}
