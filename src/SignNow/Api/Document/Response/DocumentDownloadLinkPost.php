<?php

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
