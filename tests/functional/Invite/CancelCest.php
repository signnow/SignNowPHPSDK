<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\Invite;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Invite\FieldInvite;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CancelCest
 *
 * @package SignNow\Tests\Functional\Invite
 */
class CancelCest extends BaseCest
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
    public function testCancelInvite(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();
        
        $I->mockCancelInviteRequest($documentUniqueId);

        $fieldInvite = new FieldInvite($this->auth);
        
        $response = $fieldInvite->cancelInvite($documentUniqueId);

        $I->assertSame('success', $response->getStatus());
    }
}
