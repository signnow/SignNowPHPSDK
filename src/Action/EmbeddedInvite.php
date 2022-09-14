<?php

declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Entity\Embedded\Invite\CreateEmbeddedInvites;
use SignNow\Api\Entity\Embedded\Invite\DeleteEmbeddedInvites;
use SignNow\Api\Entity\Embedded\Invite\EmbeddedInvites;
use SignNow\Api\Entity\Embedded\SigningLink\CreateSigningLink;
use SignNow\Api\Entity\Embedded\SigningLink\SigningLink;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;
use SignNow\Api\Service\OAuth\AuthMethod\Method\None;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class EmbeddedInvite
 *
 * @package SignNow\Api\Action
 */
class EmbeddedInvite
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * EmbeddedInvite constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $documentUid
     * @param array  $invites
     *
     * @return object|EmbeddedInvites
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(string $documentUid, array $invites): EmbeddedInvites
    {
        return $this->entityManager->create(
            new CreateEmbeddedInvites($invites),
            [
                'documentUniqueId' => $documentUid,
            ]
        );
    }

    /**
     * @param string                   $documentUid
     * @param string                   $fieldInviteUniqueId
     * @param null|AuthMethodInterface $authMethod
     * @param int                      $expiration
     *
     * @return object|SigningLink
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function createSigningLink(
        string $documentUid,
        string $fieldInviteUniqueId,
        int $expiration = 15,
        ?AuthMethodInterface $authMethod = null
    ): SigningLink {

        $requestEntity = (new CreateSigningLink())
            ->setAuthMethod($authMethod ?? new None());

        if ($expiration > 0)
            $requestEntity = $requestEntity->setLinkExpiration($expiration);

        return $this->entityManager->create(
            $requestEntity,
            [
                'documentUniqueId' => $documentUid,
                'fieldInviteUniqueId' => $fieldInviteUniqueId,
            ]
        );
    }

    /**
     * @param string                   $documentUid
     * @param string                   $fieldInviteUniqueId
     * @param int                      $expiration
     * @param AuthMethodInterface|null $authMethod
     *
     * @return object|SigningLink
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function setSigningLinkExpiration(
        string $documentUid,
        string $fieldInviteUniqueId,
        int $expiration,
        ?AuthMethodInterface $authMethod = null
    ) {
        return $this->createSigningLink($documentUid, $fieldInviteUniqueId, $expiration, $authMethod);
    }

    /**
     * @param string $documentUid
     *
     * @return void
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function delete(string $documentUid): void
    {
        $this->entityManager->delete(
            new DeleteEmbeddedInvites(),
            [
                'documentUniqueId' => $documentUid,
            ]
        );
    }

    /**
     * @param string $documentUniqueId
     * @param array  $invites
     *
     * @return object|EmbeddedInvites
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function replaceSigners(string $documentUniqueId, array $invites): EmbeddedInvites
    {
        $this->entityManager->delete(
            new DeleteEmbeddedInvites(),
            [
                'documentUniqueId' => $documentUniqueId,
            ]
        );

        return $this->entityManager->create(
            new CreateEmbeddedInvites($invites),
            [
                'documentUniqueId' => $documentUniqueId,
            ]
        );
    }
}