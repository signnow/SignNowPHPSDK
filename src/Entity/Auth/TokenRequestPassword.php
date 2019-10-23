<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Auth;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class TokenRequestPassword
 *
 * @HttpEntity("/oauth2/token", idProperty="")
 * @GuzzleRequestBody("form_params")
 * @ResponseType("SignNow\Api\Entity\Auth\Token")
 *
 * @package SignNow\Api\Entity\Auth
 */
class TokenRequestPassword extends TokenRequest
{
    private const GRANT_TYPE = 'password';

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $username;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $password;
    
    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->grantType = self::GRANT_TYPE;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
