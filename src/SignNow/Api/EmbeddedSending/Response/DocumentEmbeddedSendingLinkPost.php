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

namespace SignNow\Api\EmbeddedSending\Response;

use SignNow\Api\EmbeddedSending\Response\Data\DataUrl;

readonly class DocumentEmbeddedSendingLinkPost
{
    public function __construct(
        private DataUrl $data,
    ) {
    }

    public function getData(): DataUrl
    {
        return $this->data;
    }
}
