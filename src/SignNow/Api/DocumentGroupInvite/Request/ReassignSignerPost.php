<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request;

use SignNow\Api\DocumentGroupInvite\Request\Data\InviteEmail;
use SignNow\Api\DocumentGroupInvite\Request\Data\UpdateInviteActionAttributeCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'reassignSignerForDocumentGroupInvite',
    url: '/documentgroup/{document_group_id}/groupinvite/{invite_id}/invitestep/{step_id}/update',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroupInvite',
    entity: 'reassignSigner',
    type: 'application/json',
)]
final class ReassignSignerPost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $userToUpdate,
        private string $replaceWithThisUser = '',
        private ?InviteEmail $inviteEmail = null,
        private UpdateInviteActionAttributeCollection $updateInviteActionAttributes = new UpdateInviteActionAttributeCollection(),
    ) {
    }

    public function getUserToUpdate(): string
    {
        return $this->userToUpdate;
    }

    public function getReplaceWithThisUser(): string
    {
        return $this->replaceWithThisUser;
    }

    public function getInviteEmail(): ?InviteEmail
    {
        return $this->inviteEmail;
    }

    public function getUpdateInviteActionAttributes(): UpdateInviteActionAttributeCollection
    {
        return $this->updateInviteActionAttributes;
    }

    public function withDocumentGroupId(string $documentGroupId): self
    {
        $this->uriParams['document_group_id'] = $documentGroupId;

        return $this;
    }

    public function withInviteId(string $inviteId): self
    {
        $this->uriParams['invite_id'] = $inviteId;

        return $this;
    }

    public function withStepId(string $stepId): self
    {
        $this->uriParams['step_id'] = $stepId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'user_to_update' => $this->getUserToUpdate(),
           'replace_with_this_user' => $this->getReplaceWithThisUser(),
           'invite_email' => $this->getInviteEmail(),
           'update_invite_action_attributes' => $this->getUpdateInviteActionAttributes()->toArray(),
        ];
    }
}
