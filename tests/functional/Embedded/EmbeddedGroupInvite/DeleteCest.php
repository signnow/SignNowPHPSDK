<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Embedded\EmbeddedGroupInvite;

use Exception;
use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\EmbeddedDocumentGroup\EmbeddedGroupInvite;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class DeleteCest
 *
 * @package SignNow\Tests\Functional\Embedded\EmbeddedGroupInvite
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
     * @throws Exception
     */
    public function testDeleteEmbeddedGroupInvite(FunctionalTester $I): void
    {
        $documentGroupUniqueId = $I->createUniqueId();

        $embeddedGroupInvite = new EmbeddedGroupInvite($this->auth);

        $I->mockDeleteEmbeddedGroupInviteRequest($documentGroupUniqueId);

        $embeddedGroupInvite->delete($documentGroupUniqueId);
    }
}
