<?php

declare(strict_types=1);

namespace SignNow\Api\Service\EntityManager;

use ReflectionException;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager as RestEntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class EntityManager
 *
 * @package SignNow\Api\Service\EntityManager
 */
class EntityManager implements EntityManagerInterface
{
    private const CLIENT = 'SN_PHP_SDK';

    /**
     * @var RestEntityManager
     */
    private $restEntityManager;

    /**
     * @var null|string
     */
    private $clientName;

    /**
     * EntityManager constructor.
     *
     * @param RestEntityManager $baseEntityManager
     * @param null|string $clientName
     */
    public function __construct(RestEntityManager $baseEntityManager, ?string $clientName = null)
    {
        $this->restEntityManager = $baseEntityManager;
        $this->clientName = $clientName ?? self::CLIENT;
    }

    /**
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function get($entity, array $uriParams = [], array $queryParams = [], array $headers = [])
    {
        return $this->restEntityManager->get(
            $entity,
            $uriParams,
            $queryParams,
            $this->makeHeaders($headers)
        );
    }

    /**
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function create(Entity $entity, array $uriParams = [], array $queryParams = [], array $headers = [])
    {
        return $this->restEntityManager->create(
            $entity,
            $uriParams,
            $queryParams,
            $this->makeHeaders($headers)
        );
    }

    /**
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function update(Entity $entity, $uriParams = [], $queryParams = [], array $headers = [])
    {
        return $this->restEntityManager->update(
            $entity,
            $uriParams,
            $queryParams,
            $this->makeHeaders($headers)
        );
    }

    /**
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function delete(Entity $entity, $uriParams = [], $queryParams = [], array $headers = [])
    {
        return $this->restEntityManager->delete(
            $entity,
            $uriParams,
            $queryParams,
            $this->makeHeaders($headers)
        );
    }

    /**
     * @param string $updateHttpMethod
     *
     * @return $this
     */
    public function setUpdateHttpMethod(string $updateHttpMethod): self
    {
        $this->restEntityManager->setUpdateHttpMethod($updateHttpMethod);

        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    /**
     * @param array $headers
     *
     * @return array
     */
    private function makeHeaders(array $headers): array
    {
        if ($this->getClientName() === null) {
            return $headers;
        }

        return array_merge(
            $headers,
            [
                'User-Agent' => $this->getClientName(),
            ]
        );
    }
}
