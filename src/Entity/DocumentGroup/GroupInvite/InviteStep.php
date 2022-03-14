<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class InviteStep
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class InviteStep extends Entity
{
    /**
     * @var null|int
     * @Serializer\Type("int")
     */
    private $order;

    /**
     * @var InviteAction[]
     * @Serializer\Type("array<SignNow\Api\Entity\DocumentGroup\GroupInvite\InviteAction>")
     */
    private $inviteActions = [];

    /**
     * @var InviteEmail[]
     * @Serializer\Type("array<SignNow\Api\Entity\DocumentGroup\GroupInvite\InviteEmail>")
     */
    private $inviteEmails = [];

    /**
     * @return null|int
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param int $order
     *
     * @return InviteStep
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return InviteAction[]
     */
    public function getInviteActions(): array
    {
        return $this->inviteActions;
    }

    /**
     * @param InviteAction[] $inviteActions
     *
     * @return InviteStep
     */
    public function setInviteActions(array $inviteActions): self
    {
        $this->inviteActions = $inviteActions;

        return $this;
    }

    /**
     * @return InviteEmail[]
     */
    public function getInviteEmails(): array
    {
        return $this->inviteEmails;
    }

    /**
     * @param InviteEmail[] $inviteEmails
     *
     * @return InviteStep
     */
    public function setInviteEmails(array $inviteEmails): self
    {
        $this->inviteEmails = $inviteEmails;

        return $this;
    }
}
