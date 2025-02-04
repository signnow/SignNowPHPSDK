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

namespace SignNow\Api\Document\Response;

readonly class DocumentDownloadLinkPost
{
    public function __construct(
        private string $link,
    ) {
    }

    public function getLink(): string
    {
        return $this->link;
    }
}
