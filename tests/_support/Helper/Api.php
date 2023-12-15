<?php
declare(strict_types=1);

namespace Helper;

use Codeception\Module;
use Exception;
use ReflectionException;
use SignNow\Api\Action\OAuth as SignNowOAuth;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class Api
 *
 * @package Module
 */
class Api extends Module
{
    private const SIGN_NOW_API_TESTS_LOCAL_PORT = 8008;

    /**
     * @return string
     */
    public function haveSignNowApiHost(): string
    {
        return strtr(
            'http://{host}:{port}',
            [
                '{host}' => Str::getLocalHost(),
                '{port}' => self::SIGN_NOW_API_TESTS_LOCAL_PORT
            ]
        );
    }

    /**
     * @return SignNowOAuth
     */
    public function haveSignNowAuth(): SignNowOAuth
    {
        return new SignNowOAuth($this->haveSignNowApiHost());
    }

    /**
     * @return array
     * @throws Exception
     */
    public function createUserCredentials(): array
    {
        return [
            'username' => Str::generateEmail(),
            'password' => Str::generateHash8chars(),
        ];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function createBasicToken(): string
    {
        return Str::generateHash32();
    }
    
    /**
     * @return string
     * @throws Exception
     */
    public function createBearerToken(): string
    {
        return Str::generateHash64();
    }

    /**
     * @throws Exception
     */
    public function createUniqueId(): string
    {
        return Str::generateUniqueId();
    }

    /**
     * @param string $basicToken
     *
     * @return EntityManager
     */
    public function createSignNowBasicTokenAuth(string $basicToken): EntityManager
    {
        return $this->haveSignNowAuth()
            ->basicAuthorization($basicToken);
    }

    /**
     * @param array $credentials
     * @param string $basicToken
     *
     * @return EntityManager
     * @throws EntityManagerException
     * @throws ReflectionException
     * @see $this->createUserCredentials()
     */
    public function createSignNowBearerTokenAuth(array $credentials, string $basicToken): EntityManager
    {
        return $this->haveSignNowAuth()
            ->bearerByPassword(
                $basicToken,
                $credentials['username'],
                $credentials['password']
            );
    }
}
