<?php

declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Entity\Auth\Token;
use SignNow\Api\Entity\Auth\TokenRequestPassword;
use SignNow\Api\Service\Factory\EntityManagerFactory;
use SignNow\Api\Service\Factories\TokenFactory;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class OAuth
 *
 * @package SignNow\Api\Action
 */
class OAuth
{
    /**
     * SignNow API host.
     *
     * @var string
     */
    private $host;

    /**
     * @param string $host
     */
    public function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * @param string $basicToken
     *
     * @return EntityManager
     */
    public function basicAuthorization(string $basicToken): EntityManager
    {
        return (new EntityManagerFactory())->create(
            $this->host,
            (new TokenFactory())->basicToken($basicToken)
        );
    }

    /**
     * @param string $bearerToken
     *
     * @return EntityManager
     */
    public function bearerAuthorization(string $bearerToken): EntityManager
    {
        return (new EntityManagerFactory())->create(
            $this->host,
            (new TokenFactory())->bearerToken($bearerToken)
        );
    }

    /**
     * @param string $basicToken
     * @param string $username
     * @param string $password
     *
     * @return EntityManager
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function bearerByPassword(string $basicToken, string $username, string $password): EntityManager
    {
        $entityManager = $this->basicAuthorization($basicToken);

        /** @var Token $bearerToken */
        $bearerToken = $entityManager->create(
            new TokenRequestPassword($username, $password)
        );

        return $this->bearerAuthorization($bearerToken->getAccessToken());
    }
}
