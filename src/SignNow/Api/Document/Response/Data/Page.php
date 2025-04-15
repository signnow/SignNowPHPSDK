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

namespace SignNow\Api\Document\Response\Data;

readonly class Page
{
    public function __construct(
        private string $src,
        private Size $size,
    ) {
    }

    public function getSrc(): string
    {
        return $this->src;
    }

    public function getSize(): Size
    {
        return $this->size;
    }

    public function toArray(): array
    {
        return [
           'src' => $this->getSrc(),
           'size' => $this->getSize()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['src'],
            Size::fromArray($data['size']),
        );
    }
}
