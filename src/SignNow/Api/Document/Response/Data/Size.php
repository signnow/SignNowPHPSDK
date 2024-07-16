<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Size
{
    public function __construct(
        private int $width,
        private int $height,
    ) {
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function toArray(): array
    {
        return [
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['width'],
            $data['height'],
        );
    }
}
