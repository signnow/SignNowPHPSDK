<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Auth;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class TokenRequestAuthorizationCode
 *
 * @HttpEntity("/oauth2/token", idProperty="")
 * @GuzzleRequestBody("form_params")
 * @ResponseType("SignNow\Api\Entity\Auth\Token")
 *
 * @package SignNow\Api\Entity\Auth
 */
class TokenRequestAuthorizationCode extends TokenRequest
{
    private const GRANT_TYPE = 'authorization_code';

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $code;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $scope;

    /**
     * TokenRequestAuthorizationCode constructor.
     *
     * @param string $code
     * @param string $scope
     */
    public function __construct(string $code, string $scope)
    {
        $this->code = $code;
        $this->scope = $scope;
        $this->grantType = self::GRANT_TYPE;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }
}
