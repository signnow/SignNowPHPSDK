<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use Exception;
use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\Data\Document\DocumentDownloadLinkParams;
use SignNow\Api\Action\Data\Document\DownloadType;
use SignNow\Api\Action\Document;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class DownloadDocumentCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class DownloadDocumentCest extends BaseCest
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
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function testDownload(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $documentUniqueId = $I->createUniqueId();
        $expectedDocumentFileContent = str_repeat('a', 10);
        $I->mockDownloadDocumentRequest($documentUniqueId, [], $expectedDocumentFileContent);
        
        $file = $document->download($documentUniqueId);
        
        $I->assertSame($expectedDocumentFileContent, $file->getContent());
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testDownloadWithParams(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $documentUniqueId = $I->createUniqueId();
        $expectedDocumentFileContent = str_repeat('b', 20);

        $params = (new DocumentDownloadLinkParams())
            ->setType(DownloadType::COLLAPSED)
            ->setBase64(true)
            ->setWithHistory();

        $I->mockDownloadDocumentRequest($documentUniqueId, $params->toArray(), $expectedDocumentFileContent);
        
        $file = $document->download($documentUniqueId, $params);

        $I->assertSame($expectedDocumentFileContent, $file->getContent());
    }
    
    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testDownloadLink(FunctionalTester $I): void
    {
        $document = new Document($this->auth);
        
        $documentUniqueId = $I->createUniqueId();
        $expectedLink = strtr(
            'http://127.0.0.1:8008/dispatch?route=onetimedownload&document_download_id={uid}',
            [
                '{uid}' => Str::generateUniqueId(),
            ]
        );

        $I->mockDocumentDownloadLinkRequest($documentUniqueId, $expectedLink);
        
        $link = $document->createDownloadLink($documentUniqueId);
        
        $I->assertSame($expectedLink, $link->getLink());
    }
}
