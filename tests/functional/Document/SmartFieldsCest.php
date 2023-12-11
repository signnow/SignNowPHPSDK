<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\FillSmartFields;
use SignNow\Api\Entity\Document\SmartField\SmartField;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class SmartFieldsCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class SmartFieldsCest extends BaseCest
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
     * @return void
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function testSmartFields(FunctionalTester $I): void
    {
        $fillFieldsAction = new FillSmartFields($this->auth);

        $documentUniqueId = $I->createUniqueId();

        $fields = [['Country' => 'USA'], ['City' => 'Boston']];
        $smartFields = (new SmartField())->setFields($fields);

        $I->mockFillDocumentSmartFieldsRequest($documentUniqueId);

        $response = $fillFieldsAction->fill($documentUniqueId, $smartFields);

        $I->assertSame('success', $response->getStatus());
    }
}
