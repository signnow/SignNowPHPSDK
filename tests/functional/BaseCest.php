<?php

declare(strict_types=1);

namespace SignNow\Tests\Functional;

use FunctionalTester;
use SignNow\Api\Service\EntityManager\EntityManager;

/**
 * Class BaseCest
 *
 * @package SignNow\Tests\Functional
 */
class BaseCest
{
    /**
     * @var string
     */
    protected $basicToken;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $password;

    /**
     * @param FunctionalTester $I
     *
     * @return EntityManager
     */
    protected function createSignNowBasicTokenAuth(FunctionalTester $I): EntityManager
    {
        $this->createCredentials($I);
        
        return $I->createSignNowBasicTokenAuth($this->basicToken);
    }
    
    /**
     * @param FunctionalTester $I
     *
     * @return EntityManager
     */
    protected function createSignNowBearerTokenAuth(FunctionalTester $I): EntityManager
    {
        $this->createCredentials($I);
        
        $I->mockOAuthRequest(
            $this->user,
            $this->password,
            $this->basicToken
        );

        return $I->createSignNowBearerTokenAuth(
            [
                'username' => $this->user,
                'password' => $this->password,
            ],
            $this->basicToken
        );
    }

    /**
     * @param FunctionalTester $I
     */
    protected function createCredentials(FunctionalTester $I): void
    {
        $credentials = $I->createUserCredentials();
        $this->user = $credentials['username'];
        $this->password = $credentials['password'];

        $this->basicToken = $I->createBasicToken();
    }
}
