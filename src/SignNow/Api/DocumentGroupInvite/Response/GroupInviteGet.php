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
