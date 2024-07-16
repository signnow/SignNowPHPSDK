<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Response;

use SignNow\Api\EmbeddedGroupInvite\Response\Data\DataLink;

readonly class GroupInviteLinkPost
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
