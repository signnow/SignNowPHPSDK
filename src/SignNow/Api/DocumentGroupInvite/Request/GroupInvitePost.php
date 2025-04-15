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

use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteStepCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup\EmailGroupCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\CompletionEmailCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\CcCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'inviteToSignDocumentGroup',
    url: '/documentgroup/{document_group_id}/groupinvite',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroupInvite',
    entity: 'groupInvite',
    type: 'application/json',
)]
final class GroupInvitePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private InviteStepCollection $inviteSteps,
        private CcCollection $cc,
        private EmailGroupCollection $emailGroups = new EmailGroupCollection(),
        private CompletionEmailCollection $completionEmails = new CompletionEmailCollection(),
        private bool $signAsMerged = true,
        private int $clientTimestamp = 0,
        private string $ccSubject = '',
        private string $ccMessage = '',
    ) {
    }

    public function getInviteSteps(): InviteStepCollection
    {
        return $this->inviteSteps;
    }

    public function getEmailGroups(): EmailGroupCollection
    {
        return $this->emailGroups;
    }

    public function getCompletionEmails(): CompletionEmailCollection
    {
        return $this->completionEmails;
    }

    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged;
    }

    public function getClientTimestamp(): int
    {
        return $this->clientTimestamp;
    }

    public function getCc(): CcCollection
    {
        return $this->cc;
    }

    public function getCcSubject(): string
    {
        return $this->ccSubject;
    }

    public function getCcMessage(): string
    {
        return $this->ccMessage;
    }

    public function withDocumentGroupId(string $documentGroupId): self
    {
        $this->uriParams['document_group_id'] = $documentGroupId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'invite_steps' => $this->getInviteSteps()->toArray(),
           'email_groups' => !is_null($this->getEmailGroups()) ? $this->getEmailGroups()->toArray() : null,
           'completion_emails' => !is_null($this->getCompletionEmails())
               ? $this->getCompletionEmails()->toArray()
               : null,
           'sign_as_merged' => $this->isSignAsMerged(),
           'client_timestamp' => $this->getClientTimestamp(),
           'cc' => $this->getCc()->toArray(),
           'cc_subject' => $this->getCcSubject(),
           'cc_message' => $this->getCcMessage(),
        ];
    }
}
