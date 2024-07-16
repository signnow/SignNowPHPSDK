<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response;

use SignNow\Api\DocumentGroup\Response\Data\Data\Data;

readonly class DocumentGroupRecipientsGet
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
