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

use SignNow\Api\DocumentGroupInvite\Response\Data\InviteCollection;

readonly class PendingInviteGet
{
    public function __construct(
        private string $documentGroupName,
        private InviteCollection $invites = new InviteCollection(),
    ) {
    }

    public function getInvites(): InviteCollection
    {
        return $this->invites;
    }

    public function getDocumentGroupName(): string
    {
        return $this->documentGroupName;
    }
}
