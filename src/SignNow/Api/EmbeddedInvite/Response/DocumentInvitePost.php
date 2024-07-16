<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedInvite\Response;

use SignNow\Api\EmbeddedInvite\Response\Data\DataInviteCollection;

readonly class DocumentInvitePost
{
    public function __construct(
        private DataInviteCollection $data,
    ) {
    }

    public function getData(): DataInviteCollection
    {
        return $this->data;
    }
}
