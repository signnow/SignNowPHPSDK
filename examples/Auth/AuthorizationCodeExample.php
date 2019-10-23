<?php
declare(strict_types = 1);

namespace Examples\Auth;

use Examples\BaseExample;
use SignNow\Api\Entity\Auth\TokenRequestAuthorizationCode;
use SignNow\Api\Entity\Auth\Token;

/**
 * Class AuthorizationCodeExample
 *
 * @package Examples\Auth
 */
class AuthorizationCodeExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["code:", "scope:"];
    
    /**
     * @return object|Token
     *
     * @throws \ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute(): Token
    {
        return $this->entityManager->create(
            new TokenRequestAuthorizationCode(
                $this->arguments['code'],
                $this->arguments['scope'])
        );
    }
}
