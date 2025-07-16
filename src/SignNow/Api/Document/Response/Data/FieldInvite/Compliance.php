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

namespace SignNow\Api\Document\Response\Data\FieldInvite;

readonly class Compliance
{
    public function __construct(
        private ?Cfr $cfr = null,
    ) {
    }

    public function getCfr(): ?Cfr
    {
        return $this->cfr;
    }

    public function toArray(): array
    {
        return [
           'cfr' => !is_null($this->getCfr()) ? $this->getCfr()->toArray() : null,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['cfr']) ? Cfr::fromArray($data['cfr']) : null,
        );
    }
}
