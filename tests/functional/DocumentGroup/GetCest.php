<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\DocumentGroup;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\DocumentGroup\DocumentGroup;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class GetCest
 *
 * @package SignNow\Tests\Functional\DocumentGroup
 */
class GetCest extends BaseCest
{
    /**
     * @var EntityManager
     */
    private $auth;

    /**
     * @param FunctionalTester $I
     */
    public function _before(FunctionalTester $I): void
    {
        $this->auth = $this->createSignNowBearerTokenAuth($I);
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testRetrieveDocumentGroup(FunctionalTester $I): void
    {
        $documentGroup = new DocumentGroup($this->auth);
        $groupUniqueId = $I->createUniqueId();
        
        $I->mockGetDocumentGroupRequest($groupUniqueId, 'existing document group');
        
        $entity = $documentGroup->get($groupUniqueId);
        
        $I->assertSame(40, strlen($entity->getId()));
        $I->assertSame('existing document group', $entity->getGroupName());
    }
}
