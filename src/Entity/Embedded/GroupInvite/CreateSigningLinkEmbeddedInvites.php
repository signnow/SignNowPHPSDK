<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CreateSigningLinkEmbeddedInvites
 *
 * @HttpEntity(
 *     "v2/document-groups/{documentGroupUniqueId}/embedded-invites/{documentGroupInviteUniqueId}/link",
 *      idProperty=""
 * )
 * @ResponseType("SignNow\Api\Entity\Embedded\GroupInvite\SigningLinkResponse")
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class CreateSigningLinkEmbeddedInvites extends Entity
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string
     * @Serializer\Type("string")
     * @see AuthenticationMethod
     */
    private $authMethod;

    /**
     * @var null|int
     * @Serializer\Type("int")
     */
    private $linkExpiration;

    /**
     * @param string   $email
     * @param string   $authMethod
     * @param int|null $linkExpiration
     */
    public function __construct(string $email, string $authMethod, ?int $linkExpiration = null)
    {
        $this->email = $email;
        $this->authMethod = $authMethod;
        $this->linkExpiration = $linkExpiration;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    /**
     * @return int|null
     */
    public function getLinkExpiration(): ?int
    {
        return $this->linkExpiration;
    }
}
