<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Invite;

use Exception;
use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\Document;
use SignNow\Api\Action\Invite\FieldInvite;
use SignNow\Api\Entity\Document\Field\TextField;
use SignNow\Api\Entity\FreeForm\Invite as FreeFormInvite;
use SignNow\Api\Entity\Invite\Recipient;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\Invite
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
     * @throws Exception
     */
    public function testCreateFieldInvite(FunctionalTester $I): void
    {
        $document = new Document($this->auth);
        $fieldInvite = new FieldInvite($this->auth);
        
        $documentUniqueId = $I->createUniqueId();
        $role = 'role 1';

        $I->mockUpdateDocumentRequest($documentUniqueId);
        $I->mockFieldInviteRequest($documentUniqueId);
        
        $textField = (new TextField())
            ->setName('My test text')
            ->setLabel('Some label')
            ->setPrefilledText('prefilled text')
            ->setPageNumber(0)
            ->setRole($role)
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(10)
            ->setX(100)
            ->setY(150);
        $document->addFields($documentUniqueId, [$textField]);
        
        $from = Str::generateEmail();
        $to[] = new Recipient(
            Str::generateEmail(),
            $role,
            '',
            1,
            null,
            'Signing request',
            'We are waiting for your signature'
        );
        $to[] = new Recipient(
            Str::generateEmail(),
            $role,
            '',
            2,
            15,
            'Sign me',
            'Please, sign this document'
        );
        
        $response = $fieldInvite->create($documentUniqueId, $from, $to);
        
        $I->assertSame('success', $response->getStatus());
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testCreateSigningLink(FunctionalTester $I): void
    {
        $document = new Document($this->auth);
        $fieldInvite = new FieldInvite($this->auth);

        $documentUniqueId = $I->createUniqueId();
        $role = 'CEO';

        $I->mockUpdateDocumentRequest($documentUniqueId);
        $I->mockFieldInviteSigningLinkRequest($documentUniqueId);

        $textField = (new TextField())
            ->setName('resolution')
            ->setPageNumber(0)
            ->setRole($role)
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(10)
            ->setX(100)
            ->setY(150);
        $document->addFields($documentUniqueId, [$textField]);

        $response = $fieldInvite->createSigningLink($documentUniqueId);

        $I->assertStringStartsWith('https://', $response->getUrl());
        $I->assertStringStartsWith('https://', $response->getUrlNoSignup());
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testCreateFreeFormInvite(FunctionalTester $I): void
    {
        $fieldInvite = new FieldInvite($this->auth);

        $documentUniqueId = $I->createUniqueId();

        $I->mockFreeFormInviteRequest($documentUniqueId);

        $freeFormInvite = (new FreeFormInvite())
            ->setDocumentId($documentUniqueId)
            ->setTo(Str::generateEmail())
            ->setFrom(Str::generateEmail())
            ->setCc([])
            ->setSubject('Some subject')
            ->setMessage('Some message');

        $response = $fieldInvite->createFreeFormInvite($freeFormInvite);

        $I->assertSame('success', $response->getResult());
        $I->assertSame(40, strlen($response->getId()));
    }
}
