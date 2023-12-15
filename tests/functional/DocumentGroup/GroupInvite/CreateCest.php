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
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\DocumentGroup\GroupInvite
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
     * @throws ReflectionException
     * @throws EntityManagerException
     * @throws Exception
     */
    public function testCreateGroupInviteOfTwoActionsWithCompletionEmails(FunctionalTester $I): void
    {
        $reminder = (new Reminder())
            ->setRemindBefore(0)
            ->setRemindAfter(0)
            ->setRemindRepeat(0);

        $inviteEmails[] = (new InviteEmail())
            ->setEmail(Str::generateEmail())
            ->setReminder($reminder)
            ->setSubject('custom subject')
            ->setMessage('custom message')
            ->setExpirationDays(30);

        $authenticationOne = (new Authentication())
            ->setType(AuthenticationType::PHONE)
            ->setPhone('+17025841809')
            ->setMethod('phone_call');

        $inviteActionOne = (new InviteAction())
            ->setEmail(Str::generateEmail())
            ->setRoleName('Signer 1')
            ->setAction('sign')
            ->setDocumentId(Str::generateUniqueId())
            ->setAllowReassign(0)
            ->setDeclineBySignature(0)
            ->setAuthentication($authenticationOne);

        $authenticationTwo = (new Authentication())
            ->setType(AuthenticationType::PASSWORD)
            ->setValue('secRetPassWORD');
        
        $inviteActionTwo = (new InviteAction())
            ->setEmail(Str::generateEmail())
            ->setRoleName('Signer 1')
            ->setAction('sign')
            ->setDocumentId(Str::generateEmail())
            ->setAllowReassign(0)
            ->setDeclineBySignature(0)
            ->setAuthentication($authenticationTwo);

        $inviteSteps[] = (new InviteStep())
            ->setOrder(1)
            ->setInviteEmails($inviteEmails)
            ->setInviteActions([$inviteActionOne, $inviteActionTwo]);

        $completionEmails[] = (new CompletionEmail())
            ->setDisabled(true)
            ->setEmail(Str::generateEmail())
            ->setSubject('Deal!')
            ->setMessage('This is your copy of completed doc.');

        $groupInviteUniqueId = $I->createUniqueId();
        $I->mockCreateDocumentGroupInviteRequest($groupInviteUniqueId);

        $groupInvite = new GroupInvite($this->auth);
        
        $responseEntity = $groupInvite->create($groupInviteUniqueId, $inviteSteps, $completionEmails, true);
        
        $I->assertSame(strlen($responseEntity->getId()), 40);
    }

    /**
     * @throws Exception
     */
    public function testSimpleGroupInvite(FunctionalTester $I): void
    {
        $reminder = (new Reminder())
            ->setRemindBefore(0)
            ->setRemindAfter(10)
            ->setRemindRepeat(0);

        $inviteEmails[] = (new InviteEmail())
            ->setEmail(Str::generateEmail())
            ->setReminder($reminder)
            ->setSubject('topic')
            ->setMessage('I love SignNow')
            ->setExpirationDays(30);

        $authentication = (new Authentication())
            ->setType(AuthenticationType::PASSWORD)
            ->setValue(Str::generateRandomString());

        $inviteActions[] = (new InviteAction())
            ->setEmail(Str::generateEmail())
            ->setRoleName('Boss')
            ->setAction('sign')
            ->setDocumentId(Str::generateUniqueId())
            ->setAllowReassign(0)
            ->setDeclineBySignature(0)
            ->setAuthentication($authentication);

        $inviteSteps[] = (new InviteStep())
            ->setOrder(1)
            ->setInviteEmails($inviteEmails)
            ->setInviteActions($inviteActions);

        $groupInviteUniqueId = $I->createUniqueId();
        $I->mockCreateDocumentGroupInviteRequest($groupInviteUniqueId);

        $groupInvite = new GroupInvite($this->auth);

        $responseEntity = $groupInvite->create($groupInviteUniqueId, $inviteSteps);

        $I->assertSame(40, strlen($responseEntity->getId()));
    }
}
