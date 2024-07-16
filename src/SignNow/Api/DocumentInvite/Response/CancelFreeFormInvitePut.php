<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Response;

readonly class CancelFreeFormInvitePut
{
    public function __construct(
        private string $id = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
