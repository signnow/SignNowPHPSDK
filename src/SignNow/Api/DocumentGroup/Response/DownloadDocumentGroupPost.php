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

namespace SignNow\Api\DocumentGroup\Response;

use SplFileInfo;

readonly class DownloadDocumentGroupPost
{
    public function __construct(
        private SplFileInfo $fileInfo,
    ) {
    }

    public function getFile(): SplFileInfo
    {
        return $this->fileInfo;
    }
}
