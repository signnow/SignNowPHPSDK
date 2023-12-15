<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\User;

use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\User\Initial;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class UserInitialCest
 *
 * @package SignNow\Tests\Functional\User
 */
class UserInitialCest  extends BaseCest
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
        $I->mockUpdateUserInitial();

        $initial = new Initial($this->auth);

        $base64encodedImageOfInitial = Str::getBase64Image();

        $entity = $initial->upload($base64encodedImageOfInitial);

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
        $I->mockGetUserInitial();

        $initial = new Initial($this->auth);


        $entity = $initial->get();

        $I->assertSame(40, strlen($entity->getId()));
        $I->assertSame(100, $entity->getWidth());
        $I->assertSame(100, $entity->getHeight());
        $I->assertIsInt($entity->getCreated());
    }
}
