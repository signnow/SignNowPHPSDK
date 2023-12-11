<?php

declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Entity\Document\PrefillText\PrefillTextField;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;

/**
 * Class PrefillTextFields
 *
 * @package SignNow\Api\Action
 */
class PrefillTextFields
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * PrefillTextFields constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $documentUid
     * @param array $fields
     *
     * @return void
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function prefill(string $documentUid, array $fields): void
    {
        $this->entityManager->setUpdateHttpMethod(Request::METHOD_PUT);

        $this->entityManager->update(
            new PrefillTextField($fields),
            [
                'documentUniqueId' => $documentUid,
            ]
        );
    }
}
