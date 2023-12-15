<?php

declare(strict_types=1);

namespace SignNow\Api\Action\User;

use ReflectionException;
use SignNow\Api\Entity\User\Signature as UserSignatureEntity;
use SignNow\Api\Entity\User\ImageResponse;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;

/**
 * Class Signature
 *
 * @package SignNow\Api\Action\User
 */
class Signature
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Signature constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $base64ImageData
     *
     * @return object|ImageResponse
     * @throws EntityManagerException|ReflectionException
     */
    public function upload(string $base64ImageData): ImageResponse
    {
        $this->entityManager->setUpdateHttpMethod(Request::METHOD_PUT);
        
        return $this->entityManager->update(
            new UserSignatureEntity($base64ImageData)
        );
    }

    /**
     * @return object|ImageResponse
     * @throws EntityManagerException|ReflectionException
     */
    public function get(): ImageResponse
    {
        return $this->entityManager->get(
            new UserSignatureEntity()
        );
    }
}
