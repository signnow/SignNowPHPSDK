<?php

declare(strict_types=1);

namespace SignNow\Api\Action\DocumentGroup;

use ReflectionException;
use SignNow\Api\Entity\DocumentGroup\CreateDocumentGroup;
use SignNow\Api\Entity\DocumentGroup\DocumentGroup as DocumentGroupEntity;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class DocumentGroup
 *
 * @package SignNow\Api\Action
 */
class DocumentGroup
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * DocumentGroup constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $name
     * @param array  $documentUniqueIds
     *
     * @return CreateDocumentGroup|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(string $name, array $documentUniqueIds = []): CreateDocumentGroup
    {
        $documentGroupEntity = new CreateDocumentGroup();
        $documentGroupEntity
            ->setGroupName($name)
            ->setDocumentIds($documentUniqueIds);

        return $this->entityManager->create($documentGroupEntity);
    }

    /**
     * @param string $documentGroupUniqueId
     *
     * @return object|DocumentGroupEntity
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function get(string $documentGroupUniqueId): DocumentGroupEntity
    {
        return $this->entityManager->get(
            (new DocumentGroupEntity())->setId($documentGroupUniqueId)
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
            new DocumentGroupEntity(),
            [
                'id' => $documentGroupUniqueId,
            ]
        );
    }
}
