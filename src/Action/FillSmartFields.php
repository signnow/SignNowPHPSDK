<?php

declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Entity\Document\SmartField;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;

/**
 * Class FillSmartFields
 *
 * @package SignNow\Api\Action
 */
class FillSmartFields
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
     * @param string     $documentUid
     * @param SmartField $smartFields
     *
     * @return void
     *
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function fill(string $documentUid, SmartField $smartFields): void
    {
        $this->entityManager->setUpdateHttpMethod(Request::METHOD_POST);

        $this->entityManager->create(
            $smartFields,
            [
                'documentUniqueId' => $documentUid,
            ]
        );
    }
}
