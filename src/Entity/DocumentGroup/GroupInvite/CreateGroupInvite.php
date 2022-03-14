<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Entity\DocumentGroup\GroupInvite\CompletionEmail;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CreateGroupInvite
 *
 * @HttpEntity("/documentgroup/{documentGroupId}/groupinvite", idProperty="")
 * @ResponseType("SignNow\Api\Entity\DocumentGroup\GroupInvite\ResponseGroupInvite")
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class CreateGroupInvite extends Entity
{
    /**
     * @var CompletionEmail[]
     * @Serializer\Type("array<SignNow\Api\Entity\DocumentGroup\GroupInvite\CompletionEmail>")
     */
    private $completionEmails;

    /**
     * @var string|bool|null
     * @Serializer\Type("boolean")
     */
    private $signAsMerged;

    /**
     * @var InviteStep[]
     * @Serializer\Type("array<SignNow\Api\Entity\DocumentGroup\GroupInvite\InviteStep>")
     */
    private $inviteSteps = [];

    /**
     * @return CompletionEmail[]
     */
    public function getCompletionEmails(): array
    {
        return $this->completionEmails;
    }

    /**
     * @param CompletionEmail[] $completionEmails
     *
     * @return CreateGroupInvite
     */
    public function setCompletionEmails(array $completionEmails): self
    {
        $this->completionEmails = $completionEmails;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged ?? false;
    }

    /**
     * @param string|bool $signAsMerged
     *
     * @return CreateGroupInvite
     */
    public function setSignAsMerged($signAsMerged = true): self
    {
        $this->signAsMerged = is_string($signAsMerged) ? strtolower($signAsMerged) === 'true' : (bool) $signAsMerged;

        return $this;
    }

    /**
     * @return InviteStep[]
     */
    public function getInviteSteps(): array
    {
        return $this->inviteSteps;
    }

    /**
     * @param InviteStep[] $inviteSteps
     *
     * @return CreateGroupInvite
     */
    public function setInviteSteps(array $inviteSteps): self
    {
        $this->inviteSteps = $inviteSteps;

        return $this;
    }
}
