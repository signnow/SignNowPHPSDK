<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Thumbnail
{
    public function __construct(
        private string $small,
        private string $medium,
        private string $large,
    ) {
    }

    public function getSmall(): string
    {
        return $this->small;
    }

    public function getMedium(): string
    {
        return $this->medium;
    }

    public function getLarge(): string
    {
        return $this->large;
    }

    public function toArray(): array
    {
        return [
           'small' => $this->getSmall(),
           'medium' => $this->getMedium(),
           'large' => $this->getLarge(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['small'],
            $data['medium'],
            $data['large'],
        );
    }
}
