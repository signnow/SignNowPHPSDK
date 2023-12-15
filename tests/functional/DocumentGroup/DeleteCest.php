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
 * Class DeleteCest
 *
 * @package SignNow\Tests\Functional\DocumentGroup
 */
class DeleteCest extends BaseCest
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
    public function testDeleteDocumentGroup(FunctionalTester $I): void
    {
        $documentGroup = new DocumentGroup($this->auth);
        $groupUniqueId = $I->createUniqueId();
        
        $I->mockDeleteDocumentGroupRequest($groupUniqueId);
        
        $documentGroup->delete($groupUniqueId);
    }
}
