<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Response;

use SignNow\Api\DocumentInvite\Response\Data\DataCollection;
use SignNow\Api\DocumentInvite\Response\Data\Meta\Meta;

readonly class FreeFormInviteGet
{
    public function __construct(
        private Meta $meta,
        private DataCollection $data = new DataCollection(),
    ) {
    }

    public function getData(): DataCollection
    {
        return $this->data;
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }
}
