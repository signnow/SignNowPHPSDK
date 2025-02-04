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

namespace SignNow\Api\EmbeddedInvite\Response;

use SignNow\Api\EmbeddedInvite\Response\Data\DataLink;

readonly class DocumentInviteLinkPost
{
    public function __construct(
        private DataLink $data,
    ) {
    }

    public function getData(): DataLink
    {
        return $this->data;
    }
}
