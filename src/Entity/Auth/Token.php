<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Auth;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class Token
 *
 * @HttpEntity("/oauth2/token", idProperty="")
 *
 * @package SignNow\Api\Entity\Auth
 */
class Token extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $accessToken;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $refreshToken;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $scope;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $expiresIn;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $tokenType;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $applicationId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $userId;

    /**
     * @var integer|null
     * @Serializer\Type("integer")
     */
    protected $lastLogin;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $error;

    /**
     * @var int|null
     * @Serializer\Type("integer")
     */
    protected $code;

    /**
     * @var bool|null
     * @Serializer\Type("boolean")
     */
    protected $enterprise;

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param string|null $accessToken
     *
     * @return Token
     */
    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * @param string|null $refreshToken
     *
     * @return Token
     */
    public function setRefreshToken(?string $refreshToken): self
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param string|null $scope
     *
     * @return Token
     */
    public function setScope(?string $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiresIn(): ?string
    {
        return $this->expiresIn;
    }

    /**
     * @param string|null $expiresIn
     *
     * @return Token
     */
    public function setExpiresIn(?string $expiresIn): self
    {
        $this->expiresIn = $expiresIn;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }

    /**
     * @param string|null $tokenType
     *
     * @return Token
     */
    public function setTokenType(?string $tokenType): self
    {
        $this->tokenType = $tokenType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * @param string|null $applicationId
     *
     * @return Token
     */
    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return Token
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastLogin(): ?int
    {
        return $this->lastLogin;
    }

    /**
     * @param int|null $lastLogin
     *
     * @return Token
     */
    public function setLastLogin(?int $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param string|null $error
     *
     * @return Token
     */
    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @param int|null $code
     *
     * @return Token
     */
    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEnterprise(): ?bool
    {
        return $this->enterprise;
    }

    /**
     * @param bool|null $enterprise
     *
     * @return Token
     */
    public function setEnterprise(?bool $enterprise): self
    {
        $this->enterprise = $enterprise;

        return $this;
    }
}
