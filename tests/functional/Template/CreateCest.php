<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Template;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\Template;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\Template
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
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function testCreateTemplate(FunctionalTester $I): void
    {
        $template = new Template($this->auth);
        
        $I->mockCreateTemplateRequest();

        $documentUniqueId = $I->createUniqueId();
        $newTemplateName = 'Ultimate template';
        $document = $template->create($documentUniqueId, $newTemplateName);
        
        $I->assertSame(40, strlen($document->getId()));
    }
}
