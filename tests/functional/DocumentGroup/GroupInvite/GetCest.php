<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\DocumentGroup\GroupInvite;

use Exception;
use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\DocumentGroup\GroupInvite;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class GetCest
 *
 * @package SignNow\Tests\Functional\DocumentGroup\GroupInvite
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
     * @throws ReflectionException
     * @throws EntityManagerException
     * @throws Exception
     */
    public function testGetGroupInvite(FunctionalTester $I): void
    {
        $documentGroupUniqueId = $I->createUniqueId();
        $groupInviteUniqueId = $I->createUniqueId();
        $I->mockGetDocumentGroupInviteRequest($documentGroupUniqueId, $groupInviteUniqueId);

        $groupInvite = new GroupInvite($this->auth);

        $groupInviteEntity = $groupInvite->get($documentGroupUniqueId, $groupInviteUniqueId);
        $invite = $groupInviteEntity->getInvite();
        
        $I->assertSame(40, strlen($invite->getId()));
        $I->assertContains($invite->getStatus(), ['pending', 'fulfilled']);
        $I->assertIsArray($invite->getSteps());
    }
}
