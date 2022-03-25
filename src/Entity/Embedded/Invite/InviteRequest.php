<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\Invite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;
use SignNow\Api\Service\OAuth\AuthMethod\Method\None;

/**
 * Class InviteRequest
 *
 * @package SignNow\Api\Entity\Embedded\Invite
 */
class InviteRequest
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $roleId;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $order;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $authMethod;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $lastName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $redirectUri;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoleId(): string
    {
        return $this->roleId;
    }

    /**
     * @param string $roleId
     *
     * @return $this
     */
    public function setRoleId(string $roleId): self
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     *
     * @return $this
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    /**
     * @param null|AuthMethodInterface $authMethod
     *
     * @return $this
     */
    public function setAuthMethod(?AuthMethodInterface $authMethod = null): self
    {
        $this->authMethod = ($authMethod ?? new None())->getMethodName();

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    /**
     * @param string $redirectUri
     *
     * @return $this
     */
    public function setRedirectUri(string $redirectUri): self
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }
}
