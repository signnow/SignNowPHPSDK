<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Response;

readonly class SigningLinkPost
{
    public function __construct(
        private string $url,
        private string $urlNoSignup,
    ) {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getUrlNoSignup(): string
    {
        return $this->urlNoSignup;
    }
}
