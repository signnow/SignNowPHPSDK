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

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

readonly class InviteStep
{
    public function __construct(
        private int $order,
        private InviteActionCollection $inviteActions,
        private InviteEmailCollection $inviteEmails = new InviteEmailCollection(),
    ) {
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getInviteEmails(): InviteEmailCollection
    {
        return $this->inviteEmails;
    }

    public function getInviteActions(): InviteActionCollection
    {
        return $this->inviteActions;
    }

    public function toArray(): array
    {
        return [
           'order' => $this->getOrder(),
           'invite_emails' => !is_null($this->getInviteEmails()) ? $this->getInviteEmails()->toArray() : null,
           'invite_actions' => $this->getInviteActions()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['order'],
            new InviteActionCollection($data['invite_actions']),
            new InviteEmailCollection($data['invite_emails']),
        );
    }
}
