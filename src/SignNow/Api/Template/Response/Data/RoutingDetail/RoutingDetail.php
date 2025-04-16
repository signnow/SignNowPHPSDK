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

namespace SignNow\Api\Template\Response\Data\RoutingDetail;

readonly class RoutingDetail
{
    public function __construct(
        private bool $signAsMerged,
        private InviteStepCollection $inviteSteps,
        private ?string $includeEmailAttachments = null,
    ) {
    }

    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged;
    }

    public function getIncludeEmailAttachments(): ?string
    {
        return $this->includeEmailAttachments;
    }

    public function getInviteSteps(): InviteStepCollection
    {
        return $this->inviteSteps;
    }

    public function toArray(): array
    {
        return [
           'sign_as_merged' => $this->isSignAsMerged(),
           'include_email_attachments' => $this->getIncludeEmailAttachments(),
           'invite_steps' => $this->getInviteSteps()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['sign_as_merged'],
            new InviteStepCollection($data['invite_steps']),
            $data['include_email_attachments'] ?? null,
        );
    }
}
