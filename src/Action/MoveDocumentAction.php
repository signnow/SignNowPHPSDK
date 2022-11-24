<?php

declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Entity\Document\MoveDocument\MoveDocument;
use SignNow\Api\Entity\Document\MoveDocument\MoveDocumentResponse;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;

/**
 * Class MoveDocumentAction
 *
 * @package SignNow\Api\Action
 */
class MoveDocumentAction
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * MoveDocument constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string       $documentUid
     * @param MoveDocument $moveDocument
     *
     * @return MoveDocumentResponse|object
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function move(string $documentUid, MoveDocument $moveDocument): MoveDocumentResponse
    {
        $this->entityManager->setUpdateHttpMethod(Request::METHOD_POST);

        return $this->entityManager->create(
            $moveDocument,
            [
                'documentUniqueId' => $documentUid,
            ]
        );
    }
}
