<?php
declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Data\Document\GetDocumentRequestParams;
use SignNow\Api\Action\Document;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class GetDocumentCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class GetDocumentCest extends BaseCest
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
    public function testDefaultGetDocument(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $documentUniqueId = $I->createUniqueId();
        $I->mockDefaultGetDocumentRequest($documentUniqueId);
        
        $documentEntity = $document->get($documentUniqueId);

        $I->assertSame($documentEntity->getId(), $documentUniqueId);
        $I->assertSame($documentEntity->getPageCount(), '1');
        $I->assertSame($documentEntity->getTexts(), []);
    }
    
    /**
     * @param FunctionalTester $I
     *
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function testGetDocumentWithParams(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $documentUniqueId = $I->createUniqueId();
        $params = (new GetDocumentRequestParams())
            ->setExclude(
                [
                    'document_group_info',
                    'document_group_template_info',
                    'settings',
                    'signing_session_settings',
                    'enumeration_options',
                    'exported_to',
                    'notary_invites',
                    'payments',
                    'routing_details',
                ]
            )
            ->setInclude(['routing_details'])
            ->setWithAnnotation()
            ->setWithData();

        $I->mockGetDocumentRequestWithParams($documentUniqueId, $params->toArray());
        
        $documentEntity = $document->get($documentUniqueId, $params);

        $I->assertSame($documentEntity->getId(), $documentUniqueId);
    }
}
