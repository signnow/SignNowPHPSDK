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

namespace SignNow\Api\Template\Response\Data;

readonly class AttributeGet
{
    public function __construct(
        private string $brandId,
        private string $redirectUri,
        private string $onComplete,
    ) {
    }

    public function getBrandId(): string
    {
        return $this->brandId;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function getOnComplete(): string
    {
        return $this->onComplete;
    }

    public function toArray(): array
    {
        return [
           'brand_id' => $this->getBrandId(),
           'redirect_uri' => $this->getRedirectUri(),
           'on_complete' => $this->getOnComplete(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['brand_id'],
            $data['redirect_uri'],
            $data['on_complete'],
        );
    }
}
