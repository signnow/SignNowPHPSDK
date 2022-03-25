<?php

declare(strict_types=1);

namespace SignNow\Api\Service\Factory;

use SignNow\Api\Service\OAuth\TokenInterface;
use SignNow\Rest\EntityManager;
use SignNow\Rest\Factories\EntityManagerFactory as RestEntityManagerFactory;

/**
 * Class EntityManagerFactory
 *
 * @package SignNow\Api\Service\Factory
 */
class EntityManagerFactory
{
    /**
     * @param string $host
     * @param TokenInterface $token
     *
     * @return EntityManager
     */
    public function create(string $host, TokenInterface $token): EntityManager
    {
        $entityManagerFactory = new RestEntityManagerFactory(
            (new ClientFactory())->create($host, $token)
        );

        return $entityManagerFactory->create();
    }
}
