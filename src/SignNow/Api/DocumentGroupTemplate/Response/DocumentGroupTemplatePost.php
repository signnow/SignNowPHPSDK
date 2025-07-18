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

namespace SignNow\Api\DocumentGroupTemplate\Response;

use SignNow\Api\DocumentGroupTemplate\Response\Data\Data\Data;

readonly class DocumentGroupTemplatePost
{
    public function __construct(
        private Data $data,
    ) {
    }

    public function getData(): Data
    {
        return $this->data;
    }
}
