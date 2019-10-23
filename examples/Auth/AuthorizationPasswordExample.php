<?php
declare(strict_types = 1);

namespace Examples\Auth;

use Examples\BaseExample;
use SignNow\Api\Entity\Auth\TokenRequestPassword;
use SignNow\Api\Entity\Auth\Token;

/**
 * Class AuthorizationPasswordExample
 *
 * @package Examples\Auth
 */
class AuthorizationPasswordExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["username:", "password:"];
    
    /**
     * @return object|Token
     *
     * @throws \ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute()
    {
        return $this->entityManager->create(
            new TokenRequestPassword(
                $this->arguments['username'],
                $this->arguments['password']
            )
        );
    }
}
