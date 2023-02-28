<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Document;
use SignNow\Api\Entity\Document\Field\InitialsField;
use SignNow\Api\Entity\Document\Field\SignatureField;
use SignNow\Api\Entity\Document\Field\TextField;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class UpdateDocumentCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class UpdateDocumentCest extends BaseCest
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
    public function testAddFields(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $initials = (new InitialsField())
            ->setName('My Initial')
            ->setPageNumber(0)
            ->setRole('role 1')
            ->setHeight(200)
            ->setWidth(100)
            ->setX(50)
            ->setY(100);

        $text = (new TextField())
            ->setName('My text')
            ->setLabel('Some label')
            ->setPrefilledText('prefilled text')
            ->setPageNumber(0)
            ->setRole('role 1')
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(10)
            ->setX(100)
            ->setY(150);

        $signature = (new SignatureField())
            ->setName('My Signature')
            ->setPageNumber(0)
            ->setRole('role 1')
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(10)
            ->setX(5)
            ->setY(10);
        
        $documentUniqueId = $I->createUniqueId();
        
        $I->mockUpdateDocumentRequest($documentUniqueId);
        
        $documentEntity = $document->addFields(
            $documentUniqueId,
            [
                $initials,
                $text,
                $signature
            ]
        );
        
        $I->assertSame($documentUniqueId, $documentEntity->getId());
    }

    /**
     * @param FunctionalTester $I
     *
     * @return void
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testUpdateDocumentName(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $documentUniqueId = $I->createUniqueId();

        $I->mockUpdateDocumentRequest($documentUniqueId);
        
        $documentEntity = $document->modifyName($documentUniqueId, 'Updated Cool Name');

        $I->assertSame($documentUniqueId, $documentEntity->getId());
    }
}
