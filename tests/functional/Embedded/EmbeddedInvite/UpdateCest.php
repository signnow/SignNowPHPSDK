<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional\Embedded\EmbeddedInvite;

use Exception;
use FunctionalTester;
use Helper\Str;
use ReflectionException;
use SignNow\Api\Action\EmbeddedInvite;
use SignNow\Api\Entity\Embedded\Invite\InviteRequest;
use SignNow\Api\Service\OAuth\AuthMethod\Method\None;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Tests\Functional\BaseCest;

/**
 * Class UpdateCest
 *
 * @package SignNow\Tests\Functional\Embedded\EmbeddedInvite
 */
class UpdateCest extends BaseCest
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
     * @throws Exception
     */
    public function testSetEmbeddedInviteSigningLinkExpiration(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();
        $inviteUniqueId = $I->createUniqueId();
        $expirationTime = 120;

        $embeddedInvite = new EmbeddedInvite($this->auth);

        $I->mockEmbeddedInviteSigningLinkRequest($documentUniqueId, $inviteUniqueId);

        $response = $embeddedInvite->setSigningLinkExpiration($documentUniqueId, $inviteUniqueId, $expirationTime);

        $I->assertStringStartsWith('https://',$response->getLink());
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testSetEmbeddedInviteSigningNullLinkExpiration(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();
        $inviteUniqueId = $I->createUniqueId();
        $expirationTime = null;

        $embeddedInvite = new EmbeddedInvite($this->auth);

        $I->mockEmbeddedInviteSigningLinkRequest($documentUniqueId, $inviteUniqueId);

        $response = $embeddedInvite->setSigningLinkExpiration($documentUniqueId, $inviteUniqueId, $expirationTime);

        $I->assertStringStartsWith('https://',$response->getLink());
    }
}
