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

namespace SignNow\Api\EmbeddedSending\Response\Data;

readonly class DataUrl
{
    public function __construct(
        private string $url,
    ) {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function toArray(): array
    {
        return [
           'url' => $this->getUrl(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['url'],
        );
    }
}
