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

namespace SignNow\Api\EmbeddedGroupInvite\Response;

use SignNow\Api\EmbeddedGroupInvite\Response\Data\DataInvite;

readonly class GroupInvitePost
{
    public function __construct(
        private DataInvite $data,
    ) {
    }

    public function getData(): DataInvite
    {
        return $this->data;
    }
}
