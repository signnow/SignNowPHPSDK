<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\SigningLink;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;
use SignNow\Api\Service\OAuth\AuthMethod\Method\None;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CreateSigningLink
 *
 * @HttpEntity("v2/documents/{documentUniqueId}/embedded-invites/{fieldInviteUniqueId}/link", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Embedded\SigningLink\SigningLink")
 *
 * @package SignNow\Api\Entity\Embedded\SigningLink
 */
class CreateSigningLink extends Entity
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $authMethod;

    /**
     * @var null|int
     * @Serializer\Type("int")
     */
    private $linkExpiration;

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
     * @return int|null
     */
    public function getLinkExpiration(): ?int
    {
        return $this->linkExpiration;
    }

    /**
     * @param int|null $linkExpiration
     *
     * return $this
     */
    public function setLinkExpiration(?int $linkExpiration): self
    {
        $this->linkExpiration = $linkExpiration;

        return $this;
    }
}
