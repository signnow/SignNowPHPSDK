<?php

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
