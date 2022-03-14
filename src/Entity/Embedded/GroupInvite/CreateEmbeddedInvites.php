<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CreateEmbeddedInvites
 *
 * @HttpEntity("v2/document-groups/{documentGroupUniqueId}/embedded-invites", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Embedded\GroupInvite\EmbeddedInvites")
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class CreateEmbeddedInvites extends Entity
{
    /**
     * @var InviteRequest[]
     * @Serializer\Type("array<SignNow\Api\Entity\Embedded\GroupInvite\InviteRequest>")
     */
    private $invites;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $signAsMerged;

    /**
     * CreateEmbeddedInvites constructor.
     *
     * @param InviteRequest[] $invites
     * @param bool $signAsMerged
     */
    public function __construct(array $invites, bool $signAsMerged = false)
    {
        $this->invites = $invites;
        $this->signAsMerged = $signAsMerged;
    }

    /**
     * @return InviteRequest[]
     */
    public function getInvites(): array
    {
        return $this->invites;
    }

    /**
     * @param InviteRequest[] $invites
     *
     * @return CreateEmbeddedInvites
     */
    public function setInvites(array $invites): CreateEmbeddedInvites
    {
        $this->invites = $invites;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged;
    }

    /**
     * @param bool $signAsMerged
     *
     * @return CreateEmbeddedInvites
     */
    public function setSignAsMerged(bool $signAsMerged): CreateEmbeddedInvites
    {
        $this->signAsMerged = $signAsMerged;

        return $this;
    }
}
