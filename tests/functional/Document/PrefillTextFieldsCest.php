<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Document;

use FunctionalTester;
use ReflectionException;
use SignNow\Api\Action\PrefillTextFields;
use SignNow\Api\Entity\Document\PrefillText\FieldRequest;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class PrefillTextFieldsCest
 *
 * @package SignNow\Tests\Functional\Document
 */
class PrefillTextFieldsCest extends BaseCest
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
    public function testPrefillTextFields(FunctionalTester $I): void
    {
        $prefillTextFieldsAction = new PrefillTextFields($this->auth);

        $documentUniqueId = $I->createUniqueId();
        
        $fields = [];
        $fields[] = (new FieldRequest())
            ->setFieldName('Country')
            ->setPrefilledText('USA');
        $fields[] = (new FieldRequest())
            ->setFieldName('City')
            ->setPrefilledText('Boston');
        
        $I->mockPrefillDocumentTextFieldsRequest($documentUniqueId);
        
        $prefillTextFieldsAction->prefill($documentUniqueId, $fields);
    }
}
