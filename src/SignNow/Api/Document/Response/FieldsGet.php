<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response;

use SignNow\Api\Document\Response\Data\DataCollection;

readonly class FieldsGet
{
    public function __construct(
        private DataCollection $data,
    ) {
    }

    public function getData(): DataCollection
    {
        return $this->data;
    }
}
