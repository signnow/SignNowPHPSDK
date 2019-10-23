<?php
declare(strict_types = 1);

namespace Examples\Auth;

use Examples\BaseExample;
use SignNow\Api\Entity\Auth\TokenRequestRefresh;
use SignNow\Api\Entity\Auth\Token;

/**
 * Class AuthorizationRefreshTokenExample
 *
 * @package Examples\Auth
 */
class AuthorizationRefreshTokenExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["refresh_token:"];
    
    /**
     * @return object|Token
     *
     * @throws \ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute(): Token
    {
        return $this->entityManager->create(new TokenRequestRefresh($this->arguments['refresh_token']));
    }
}
