<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\Embedded\EmbeddedInvite;

use Exception;
use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\EmbeddedInvite;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class DeleteCest
 *
 * @package SignNow\Tests\Functional\Embedded\EmbeddedInvite
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
    public function testDeleteEmbeddedInvite(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();

        $embeddedInvite = new EmbeddedInvite($this->auth);

        $I->mockDeleteEmbeddedInviteRequest($documentUniqueId);

        $embeddedInvite->delete($documentUniqueId);
    }
}
