<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Auth;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class TokenRequestRefresh
 *
 * @HttpEntity("/oauth2/token", idProperty="")
 * @GuzzleRequestBody("form_params")
 * @ResponseType("SignNow\Api\Entity\Auth\Token")
 *
 * @package SignNow\Api\Entity\Auth
 */
class TokenRequestRefresh extends TokenRequest
{
    private const GRANT_TYPE = 'refresh_token';

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $refreshToken;

    /**
     * TokenRequestRefresh constructor.
     *
     * @param string $refreshToken
     */
    public function __construct(string $refreshToken)
    {
        $this->refreshToken = $refreshToken;
        $this->grantType = self::GRANT_TYPE;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
