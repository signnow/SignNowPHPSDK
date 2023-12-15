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
     * @var null|string
     * @Serializer\Type("string")
     */
    private $redirectUri;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $declineRedirectUri;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $closeRedirectUri;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $redirectTarget;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $prefillSignatureName;

    /**
     * @var null|integer
     * @Serializer\Type("integer")
     */
    private $forceNewSignature;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $signingInstructions;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $requiredPresetSignatureName;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $language;

    /**
     * @return string|null
     */
    public function getDeclineRedirectUri(): ?string
    {
        return $this->declineRedirectUri;
    }

    /**
     * @param string|null $declineRedirectUri
     *
     * @return InviteRequest
     */
    public function setDeclineRedirectUri(?string $declineRedirectUri): InviteRequest
    {
        $this->declineRedirectUri = $declineRedirectUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCloseRedirectUri(): ?string
    {
        return $this->closeRedirectUri;
    }

    /**
     * @param string|null $closeRedirectUri
     *
     * @return InviteRequest
     */
    public function setCloseRedirectUri(?string $closeRedirectUri): InviteRequest
    {
        $this->closeRedirectUri = $closeRedirectUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRedirectTarget(): ?string
    {
        return $this->redirectTarget;
    }

    /**
     * @param string|null $redirectTarget
     *
     * @return InviteRequest
     */
    public function setRedirectTarget(?string $redirectTarget): InviteRequest
    {
        $this->redirectTarget = $redirectTarget;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrefillSignatureName(): ?string
    {
        return $this->prefillSignatureName;
    }

    /**
     * @param string|null $prefillSignatureName
     *
     * @return InviteRequest
     */
    public function setPrefillSignatureName(?string $prefillSignatureName): InviteRequest
    {
        $this->prefillSignatureName = $prefillSignatureName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForceNewSignature(): ?int
    {
        return $this->forceNewSignature;
    }

    /**
     * @param int|null $forceNewSignature
     *
     * @return InviteRequest
     */
    public function setForceNewSignature(?int $forceNewSignature): InviteRequest
    {
        $this->forceNewSignature = $forceNewSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSigningInstructions(): ?string
    {
        return $this->signingInstructions;
    }

    /**
     * @param string|null $signingInstructions
     *
     * @return InviteRequest
     */
    public function setSigningInstructions(?string $signingInstructions): InviteRequest
    {
        $this->signingInstructions = $signingInstructions;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequiredPresetSignatureName(): ?string
    {
        return $this->requiredPresetSignatureName;
    }

    /**
     * @param string|null $requiredPresetSignatureName
     *
     * @return InviteRequest
     */
    public function setRequiredPresetSignatureName(?string $requiredPresetSignatureName): InviteRequest
    {
        $this->requiredPresetSignatureName = $requiredPresetSignatureName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     *
     * @return InviteRequest
     */
    public function setLanguage(?string $language): InviteRequest
    {
        $this->language = $language;

        return $this;
    }

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
     * @return null|string
     */
    public function getRedirectUri(): ?string
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
