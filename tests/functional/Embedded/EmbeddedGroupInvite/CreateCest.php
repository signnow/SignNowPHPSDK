<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Embedded\EmbeddedGroupInvite;

use Exception;
use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\Data\EmbeddedDocumentGroupInvite\Action;
use SignNow\Api\Action\Data\EmbeddedDocumentGroupInvite\AuthenticationMethod;
use SignNow\Api\Action\EmbeddedDocumentGroup\EmbeddedGroupInvite;
use SignNow\Api\Entity\Embedded\GroupInvite\Document;
use SignNow\Api\Entity\Embedded\GroupInvite\InviteRequest;
use SignNow\Api\Entity\Embedded\GroupInvite\Signer;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\Embedded\EmbeddedGroupInvite
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
     * @throws Exception
     */
    public function testCreateEmbeddedGroupInvite(FunctionalTester $I): void
    {
        $documentUniqueId1 = $I->createUniqueId();
        $documentUniqueId2 = $I->createUniqueId();
        $documentGroupUniqueId = $I->createUniqueId();
        
        $signerEmail = Str::generateEmail();
        $role1 = 'Company';
        $role2 = 'Customer';
        
        $document1 = (new Document())
            ->setRole($role1)
            ->setId($documentUniqueId1)
            ->setAction(Action::ACTION_SIGN);
        $document2 = (new Document())
            ->setRole($role2)
            ->setId($documentUniqueId2)
            ->setAction(Action::ACTION_SIGN);
        
        $signer1 = (new Signer())
            ->setEmail($signerEmail)
            ->setAuthMethod(AuthenticationMethod::AUTH_METHOD_NONE)
            ->setDocuments([$document1, $document2]);
        
        $invite1 = (new InviteRequest())
            ->setOrder(1)
            ->setSigners([$signer1]);

        $I->mockCreateEmbeddedGroupInviteRequest($documentGroupUniqueId);
        
        $embeddedGroupInvite = new EmbeddedGroupInvite($this->auth);
        $embeddedInvites = $embeddedGroupInvite->create($documentGroupUniqueId, [$invite1]);
        
        $I->assertSame(40, strlen($embeddedInvites->getInviteUniqueId()));
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws Exception
     */
    public function testCreateMultiStepEmbeddedGroupInvite(FunctionalTester $I): void
    {
        $documentUniqueId1 = $I->createUniqueId();
        $documentUniqueId2 = $I->createUniqueId();
        $documentGroupUniqueId = $I->createUniqueId();

        $signerEmail1 = Str::generateEmail();
        $signerEmail2 = Str::generateEmail();
        $roleSign1 = 'Company';
        $roleSign2 = 'Customer';
        $roleViewer = 'Lawyer';
        $roleSign3 = 'Notary';

        $document1 = (new Document())
            ->setRole($roleSign1)
            ->setId($documentUniqueId1)
            ->setAction(Action::ACTION_SIGN);
        $document2 = (new Document())
            ->setRole($roleSign2)
            ->setId($documentUniqueId2)
            ->setAction(Action::ACTION_SIGN);
        $document3 = (new Document())
            ->setRole($roleViewer)
            ->setId($documentUniqueId1)
            ->setAction(Action::ACTION_VIEW);

        $signer1 = (new Signer())
            ->setEmail($signerEmail1)
            ->setAuthMethod(AuthenticationMethod::AUTH_METHOD_NONE)
            ->setDocuments([$document1, $document2, $document3]);

        $document1 = (new Document())
            ->setRole($roleSign3)
            ->setId($documentUniqueId1)
            ->setAction(Action::ACTION_SIGN);

        $document2 = (new Document())
            ->setRole($roleSign3)
            ->setId($documentUniqueId2)
            ->setAction(Action::ACTION_SIGN);
        
        $signer2 = (new Signer())
            ->setEmail($signerEmail2)
            ->setAuthMethod(AuthenticationMethod::AUTH_METHOD_EMAIL)
            ->setDocuments([$document1, $document2]);
        
        $invite1 = (new InviteRequest())
            ->setOrder(1)
            ->setSigners([$signer1]);

        $invite2 = (new InviteRequest())
            ->setOrder(2)
            ->setSigners([$signer2]);

        $I->mockCreateEmbeddedGroupInviteRequest($documentGroupUniqueId);

        $embeddedGroupInvite = new EmbeddedGroupInvite($this->auth);
        $embeddedInvites = $embeddedGroupInvite->create($documentGroupUniqueId, [$invite1, $invite2]);

        $I->assertSame(40, strlen($embeddedInvites->getInviteUniqueId()));
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testCreateSigningLink(FunctionalTester $I): void
    {
        $documentUniqueId1 = $I->createUniqueId();
        $documentUniqueId2 = $I->createUniqueId();
        $documentGroupUniqueId = $I->createUniqueId();

        $signerEmail = Str::generateEmail();
        $role = 'Signer';

        $invite = (new InviteRequest())
            ->setOrder(1)
            ->setSigners(
                [
                    (new Signer())
                        ->setEmail($signerEmail)
                        ->setAuthMethod(AuthenticationMethod::AUTH_METHOD_NONE)
                        ->setDocuments(
                            [
                                (new Document())
                                    ->setRole($role)
                                    ->setId($documentUniqueId1)
                                    ->setAction(Action::ACTION_SIGN),
                                (new Document())
                                    ->setRole($role)
                                    ->setId($documentUniqueId2)
                                    ->setAction(Action::ACTION_SIGN)
                            ]
                        )
                ]
            );

        $I->mockCreateEmbeddedGroupInviteRequest($documentGroupUniqueId);

        $embeddedGroupInvite = new EmbeddedGroupInvite($this->auth);
        $embeddedInvites = $embeddedGroupInvite->create($documentGroupUniqueId, [$invite]);

        $I->mockCreateSigningLinkEmbeddedGroupInviteRequest(
            $documentGroupUniqueId,
            $embeddedInvites->getInviteUniqueId()
        );

        $response = $embeddedGroupInvite->createSigningLink(
            $documentGroupUniqueId,
            $embeddedInvites->getInviteUniqueId(),
            $signerEmail,
            AuthenticationMethod::AUTH_METHOD_NONE,
            20
        );

        $I->assertStringStartsWith('https://', $response->getLink());
    }
}
