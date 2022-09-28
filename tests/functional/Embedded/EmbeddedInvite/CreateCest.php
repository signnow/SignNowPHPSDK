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
 * Class CreateCest
 *
 * @package SignNow\Tests\Functional\Embedded\EmbeddedInvite
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
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testCreateEmbeddedInvite(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();
        
        $embeddedInvite = new EmbeddedInvite($this->auth);
        
        $invite = (new InviteRequest())
            ->setEmail(Str::generateEmail())
            ->setRoleId(Str::generateUniqueId())
            ->setOrder(1)
            ->setAuthMethod(new None())
            ->setFirstName('Paul')
            ->setLastName('Random');

        $I->mockEmbeddedInviteRequest($documentUniqueId);
        
        $embeddedInvites = $embeddedInvite->create($documentUniqueId, [$invite]);
        $invites = $embeddedInvites->getInvites();
        
        $I->assertIsArray($invites);
        $I->assertNotEmpty($invites);
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testCreateEmbeddedInviteSigningLink(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();
        $inviteUniqueId = $I->createUniqueId();

        $embeddedInvite = new EmbeddedInvite($this->auth);

        $I->mockEmbeddedInviteSigningLinkRequest($documentUniqueId, $inviteUniqueId);

        $response = $embeddedInvite->createSigningLink($documentUniqueId, $inviteUniqueId);

        $I->assertStringStartsWith('https://', $response->getLink());
    }

    /**
     * @param FunctionalTester $I
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     * @throws Exception
     */
    public function testCreateEmbeddedInviteSigningLinkExpirationNull(FunctionalTester $I): void
    {
        $documentUniqueId = $I->createUniqueId();
        $inviteUniqueId = $I->createUniqueId();

        $embeddedInvite = new EmbeddedInvite($this->auth);

        $I->mockEmbeddedInviteSigningLinkRequest($documentUniqueId, $inviteUniqueId);

        $response = $embeddedInvite->createSigningLink($documentUniqueId, $inviteUniqueId, null);

        $I->assertStringStartsWith('https://', $response->getLink());
    }
}
