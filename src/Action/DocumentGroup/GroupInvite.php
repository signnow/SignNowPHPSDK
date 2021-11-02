<?php
declare(strict_types=1);

namespace SignNow\Api\Action\DocumentGroup;

use ReflectionException;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\Cancel as DocumentGroupInviteCancel;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\CreateGroupInvite;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\GroupInvite as GroupInviteEntity;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\ResponseGroupInvite;
use SignNow\Api\Entity\Status;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class GroupInvite
 *
 * @package SignNow\Api\Action\DocumentGroup
 */
class GroupInvite
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * GroupInvite constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $groupInviteUniqueId
     * @param array  $inviteSteps
     * @param array  $completionEmails
     * @param bool   $signAsMerged
     *
     * @return ResponseGroupInvite|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(
        string $groupInviteUniqueId,
        array $inviteSteps,
        array $completionEmails = [],
        bool $signAsMerged = false
    ): ResponseGroupInvite {
        
        $groupInvite = (new CreateGroupInvite())
            ->setInviteSteps($inviteSteps)
            ->setCompletionEmails($completionEmails)
            ->setSignAsMerged($signAsMerged);

        return $this->entityManager->create(
            $groupInvite,
            [
                'documentGroupId' => $groupInviteUniqueId,
            ]
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param string $groupInviteUniqueId
     *
     * @return GroupInviteEntity|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function get(string $documentGroupUniqueId, string $groupInviteUniqueId): GroupInviteEntity
    {
        return $this->entityManager->get(
            new GroupInviteEntity(),
            [
                'documentGroupId' => $documentGroupUniqueId,
                'inviteId'        => $groupInviteUniqueId,
            ]
        );
    }
    
    /**
     * @param string $documentGroupUniqueId
     * @param string $groupInviteUniqueId
     *
     * @return Status|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function cancel(string $documentGroupUniqueId, string $groupInviteUniqueId): Status
    {
        return $this->entityManager->create(
            new DocumentGroupInviteCancel(),
            [
                'documentGroupId' => $documentGroupUniqueId,
                'groupInviteId'   => $groupInviteUniqueId,
            ]
        );
    }
}
