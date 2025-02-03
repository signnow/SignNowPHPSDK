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

namespace SignNow\Api\WebhookV2\Response\Data;

readonly class RequestHeader
{
    public function __construct(
        private ?string $stringHead = null,
        private ?int $intHead = null,
        private ?bool $boolHead = null,
        private ?float $floatHead = null,
    ) {
    }

    public function getStringHead(): ?string
    {
        return $this->stringHead;
    }

    public function getIntHead(): ?int
    {
        return $this->intHead;
    }

    public function isBoolHead(): ?bool
    {
        return $this->boolHead;
    }

    public function getFloatHead(): ?float
    {
        return $this->floatHead;
    }

    public function toArray(): array
    {
        return [
           'string_head' => $this->getStringHead(),
           'int_head' => $this->getIntHead(),
           'bool_head' => $this->isBoolHead(),
           'float_head' => $this->getFloatHead(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['string_head'] ?? null,
            $data['int_head'] ?? null,
            $data['bool_head'] ?? null,
            $data['float_head'] ?? null,
        );
    }
}
