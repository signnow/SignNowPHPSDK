<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Response;

readonly class FreeFormInvitePost
{
    public function __construct(
        private string $result,
        private string $id,
        private string $callbackUrl,
    ) {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }
}
