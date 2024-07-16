<?php

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
