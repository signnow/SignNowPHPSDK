<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response;

use SignNow\Api\DocumentGroupInvite\Response\Data\Invite\Invite;

readonly class GroupInviteGet
{
    public function __construct(
        private Invite $invite,
    ) {
    }

    public function getInvite(): Invite
    {
        return $this->invite;
    }
}
