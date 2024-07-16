<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response;

readonly class InitialPut
{
    public function __construct(
        private string $id,
        private string $width,
        private string $height,
        private string $created,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getCreated(): string
    {
        return $this->created;
    }
}
