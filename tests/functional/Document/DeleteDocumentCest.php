<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Document;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class DeleteDocumentCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class DeleteDocumentCest extends BaseCest
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
    public function testDeleteDocument(FunctionalTester $I): void
    {
        $document = new Document($this->auth);

        $documentUniqueId = $I->createUniqueId();
        
        $I->mockDeleteDocumentRequest($documentUniqueId);
        
        $document->delete($documentUniqueId);
    }
}
