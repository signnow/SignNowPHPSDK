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

namespace SignNow\Api\User\Response;

readonly class InitialGet
{
    public function __construct(
        private string $uniqueId,
        private string $width,
        private string $height,
        private string $data,
        private string $created,
    ) {
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getCreated(): string
    {
        return $this->created;
    }
}
