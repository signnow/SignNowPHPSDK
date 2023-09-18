<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\User;

use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\User\Signature;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class UserSignatureCest
 *
 * @package SignNow\Tests\Functional\User
 */
class UserSignatureCest  extends BaseCest
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
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function testUpdate(FunctionalTester $I): void
    {
        $I->mockUpdateUserSignature();

        $signature = new Signature($this->auth);

        $base64encodedImageOfSignature = Str::getBase64Image();

        $entity = $signature->upload($base64encodedImageOfSignature);

        $I->assertSame(40, strlen($entity->getId()));
        $I->assertSame(100, $entity->getWidth());
        $I->assertSame(100, $entity->getHeight());
        $I->assertIsInt($entity->getCreated());
    }

    /**
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function testGet(FunctionalTester $I): void
    {
        $I->mockGetUserSignature();

        $signature = new Signature($this->auth);


        $entity = $signature->get();

        $I->assertSame(40, strlen($entity->getId()));
        $I->assertSame(100, $entity->getWidth());
        $I->assertSame(100, $entity->getHeight());
        $I->assertIsInt($entity->getCreated());
    }
}
