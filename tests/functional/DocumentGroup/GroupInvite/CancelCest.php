<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\DocumentGroup\GroupInvite;

use Exception;
use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\Data\DocumentGroupInvite\AuthenticationType;
use SignNow\Api\Action\DocumentGroup\GroupInvite;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\Authentication;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\CompletionEmail;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\InviteAction;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\InviteEmail;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\InviteStep;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\Reminder;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CancelCest
 *
 * @package SignNow\Tests\Functional\DocumentGroup\GroupInvite
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
    public function testCancelGroupInvite(FunctionalTester $I): void
    {
        $documentGroupUniqueId = $I->createUniqueId();
        $groupInviteUniqueId = $I->createUniqueId();
        $I->mockCancelDocumentGroupInviteRequest($documentGroupUniqueId, $groupInviteUniqueId);

        $groupInvite = new GroupInvite($this->auth);
        
        $status = $groupInvite->cancel($documentGroupUniqueId, $groupInviteUniqueId);
        
        $I->assertSame('success', $status->getStatus());
    }
}
