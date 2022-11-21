<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Entity\Document\MoveDocument\MoveDocument;
use SignNow\Api\Action\MoveDocumentAction as MoveDocumentAction;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class MoveDocumentCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class MoveDocumentCest extends BaseCest
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
    public function testMoveDocument(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();

        $moveDocumentEntity = new MoveDocument();
        $moveDocumentEntity->setFolderId($I->createUniqueId());

        $moveDocumentAction = new MoveDocumentAction($this->auth);

        $I->mockMoveDocumentRequest($documentUniqueId);

        $response = $moveDocumentAction->move($documentUniqueId, $moveDocumentEntity);

        $I->assertSame('success', $response->getResult());
    }
}
