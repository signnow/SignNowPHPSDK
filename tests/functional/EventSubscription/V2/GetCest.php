<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\EventSubscription\V2;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Data\EventSubscription\V2\EventsList;
use SignNow\Api\Action\EventSubscription\V2\EventSubscriptionBasicToken;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class GetCest
 *
 * @package SignNow\Tests\Functional\EventSubscription\V2
 */
class GetCest extends BaseCest
{
    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testGetEventSubscriptionRequestWithBasicToken(FunctionalTester $I): void
    {
        $I->mockCreateEventSubscriptionRequestWithBasicToken();
        $I->mockGetEventSubscriptionsRequestWithBasicToken();

        $eventSubscription = new EventSubscriptionBasicToken($this->createSignNowBasicTokenAuth($I));
        $eventSubscription->create(
            EventsList::DOCUMENT_INVITE_SENT,
            $I->createUniqueId(),
            'https://your.resource.com/handler'
        );
        
        $collection = $eventSubscription->get();
        $events = $collection->getData();
        $meta = $collection->getMeta();
        
        $I->assertIsArray($events);
        $I->assertNotEmpty($events);
        $I->assertNotEmpty($meta);
        
        $pagination = $meta->getPagination();

        $I->assertNotEmpty($pagination->getCount());
        $I->assertNotEmpty($pagination->getTotal());
        $I->assertNotEmpty($pagination->getTotalPages());
        $I->assertNotEmpty($pagination->getCurrentPage());
        $I->assertNotEmpty($pagination->getPerPage());
    }
}
