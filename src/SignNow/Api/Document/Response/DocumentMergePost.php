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

readonly class DocumentMergePost
{
    public function __construct(
        private string $documentId,
    ) {
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }
}
