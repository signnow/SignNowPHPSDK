<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Response\Data;

readonly class DataLink
{
    public function __construct(
        private string $link,
    ) {
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function toArray(): array
    {
        return [
           'link' => $this->getLink(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['link'],
        );
    }
}
