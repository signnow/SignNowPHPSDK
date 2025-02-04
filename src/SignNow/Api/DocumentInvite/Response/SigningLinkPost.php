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
