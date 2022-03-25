<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class GroupInvite
 *
 * @HttpEntity("/documentgroup/{documentGroupId}/groupinvite/{inviteId}", idProperty="")
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class GroupInvite extends Entity
{
    /**
     * @var Invite
     * @Serializer\Type("SignNow\Api\Entity\DocumentGroup\GroupInvite\Invite")
     */
    private $invite;

    /**
     * @return Invite
     */
    public function getInvite(): Invite
    {
        return $this->invite;
    }

    /**
     * @param Invite $invite
     *
     * @return GroupInvite
     */
    public function setInvite(Invite $invite): self
    {
        $this->invite = $invite;

        return $this;
    }
}
