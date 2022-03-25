<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\DocumentGroup;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\DocumentGroup\DocumentGroup;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\DocumentGroup
 */
class CreateCest extends BaseCest
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
    public function testCreate(FunctionalTester $I): void
    {
        $documentGroup = new DocumentGroup($this->auth);
        $groupName = 'my awesome group';
        $documentIds = [
            $I->createUniqueId(),
            $I->createUniqueId(),
            $I->createUniqueId(),
        ];
        
        $I->mockCreateDocumentGroupRequest($groupName, $documentIds);
        
        $entity = $documentGroup->create(
            $groupName,
            $documentIds
        );
        
        $I->assertSame(40, strlen($entity->getId()));
    }
}
