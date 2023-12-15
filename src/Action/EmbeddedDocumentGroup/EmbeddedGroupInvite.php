<?php

declare(strict_types=1);

namespace SignNow\Api\Action\EmbeddedDocumentGroup;

use ReflectionException;
use SignNow\Api\Entity\Embedded\GroupInvite\CreateEmbeddedInvites;
use SignNow\Api\Entity\Embedded\GroupInvite\CreateSigningLinkEmbeddedInvites;
use SignNow\Api\Entity\Embedded\GroupInvite\DeleteEmbeddedInvites;
use SignNow\Api\Entity\Embedded\GroupInvite\EmbeddedInvites;
use SignNow\Api\Entity\Embedded\GroupInvite\SigningLinkResponse;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class EmbeddedGroupInvite
 *
 * @package SignNow\Api\Action\EmbeddedDocumentGroup
 */
class EmbeddedGroupInvite
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * EmbeddedGroupInvite constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $documentGroupUniqueId
     * @param array  $invites
     * @param bool   $signAsMerged
     *
     * @return EmbeddedInvites|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(string $documentGroupUniqueId, array $invites, bool $signAsMerged = true): EmbeddedInvites
    {
        return $this->entityManager->create(
            new CreateEmbeddedInvites($invites, $signAsMerged),
            [
                'documentGroupUniqueId' => $documentGroupUniqueId,
            ]
        );
    }

    /**
     * @param string   $documentGroupUniqueId
     * @param string   $documentGroupInviteUniqueId
     * @param string   $email
     * @param string   $authMethod
     * @param int|null $expiration
     *
     * @return SigningLinkResponse|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function createSigningLink(
        string $documentGroupUniqueId,
        string $documentGroupInviteUniqueId,
        string $email,
        string $authMethod,
        ?int $expiration = null
    ): SigningLinkResponse {
        return $this->entityManager->create(
            new CreateSigningLinkEmbeddedInvites($email, $authMethod, $expiration),
            [
                'documentGroupUniqueId' => $documentGroupUniqueId,
                'documentGroupInviteUniqueId' => $documentGroupInviteUniqueId,
            ]
        );
    }

    /**
     * @param string $documentGroupUniqueId
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function delete(string $documentGroupUniqueId): void
    {
        $this->entityManager->delete(
            new DeleteEmbeddedInvites(),
            [
                'documentGroupUniqueId' => $documentGroupUniqueId,
            ]
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param array  $invites
     * @param bool   $signAsMerged
     *
     * @return EmbeddedInvites
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function replace(string $documentGroupUniqueId, array $invites, bool $signAsMerged = true): EmbeddedInvites
    {
        $this->delete($documentGroupUniqueId);

        return $this->create($documentGroupUniqueId, $invites, $signAsMerged);
    }
}
