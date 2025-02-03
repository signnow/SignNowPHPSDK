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

namespace SignNow\Api\Template\Request\Data\RoutingDetail;

readonly class RoutingDetail
{
    public function __construct(
        private InviteStepCollection $inviteSteps,
        private int $includeEmailAttachments,
    ) {
    }

    public function getInviteSteps(): InviteStepCollection
    {
        return $this->inviteSteps;
    }

    public function getIncludeEmailAttachments(): int
    {
        return $this->includeEmailAttachments;
    }

    public function toArray(): array
    {
        return [
           'invite_steps' => $this->getInviteSteps()->toArray(),
           'include_email_attachments' => $this->getIncludeEmailAttachments(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new InviteStepCollection($data['invite_steps']),
            $data['include_email_attachments'],
        );
    }
}
