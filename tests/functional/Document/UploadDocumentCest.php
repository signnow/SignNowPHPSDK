<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Data\Document\TextTagFieldType;
use SignNow\Api\Action\Document;
use SignNow\Api\Entity\Document\TextTag;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class UploadDocumentCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class UploadDocumentCest extends BaseCest
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
    public function testUpload(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $I->mockUploadDocumentRequest();
        
        $pdfFileToUpload = codecept_data_dir('blank.pdf');
        $documentEntity = $document->upload($pdfFileToUpload);
        
        $I->assertSame(40, strlen($documentEntity->getId()));
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testFieldExtract(FunctionalTester $I): void
    {
        $document = new Document($this->auth);
        
        $I->mockFieldExtractUploadDocumentRequest();

        $pdfFileToUpload = codecept_data_dir('blank.pdf');
        $textTags[] = (new TextTag())
            ->setTagName('employee name')
            ->setLabel('name')
            ->setRole('employee')
            ->setRequired()
            ->setType(TextTagFieldType::TEXT)
            ->setWidth(100)
            ->setHeight(15);

        $textTags[] = (new TextTag())
            ->setTagName('department')
            ->setLabel('department')
            ->setRole('employee')
            ->setRequired()
            ->setType(TextTagFieldType::ENUMERATION)
            ->setEnumerationOptions(['HR', 'Sales', 'Marketing'])
            ->setWidth(100)
            ->setHeight(15);
        
        $documentEntity = $document->uploadWithTags($pdfFileToUpload, $textTags);

        $I->assertSame(40, strlen($documentEntity->getId()));
    }
}
