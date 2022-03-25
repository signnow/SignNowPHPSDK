<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\Invite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CreateEmbeddedInvites
 *
 * @HttpEntity("v2/documents/{documentUniqueId}/embedded-invites", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Embedded\Invite\EmbeddedInvites")
 *
 * @package SignNow\Api\Entity\Embedded\Invite
 */
class CreateEmbeddedInvites extends Entity
{
    /**
     * @var InviteRequest[]
     * @Serializer\Type("array<SignNow\Api\Entity\Embedded\Invite\InviteRequest>")
     */
    private $invites;

    /**
     * Invite constructor.
     *
     * @param InviteRequest[] $invites
     */
    public function __construct(array $invites)
    {
        $this->invites = $invites;
    }

    /**
     * @return InviteRequest[]
     */
    public function getInvites(): array
    {
        return $this->invites;
    }
}
