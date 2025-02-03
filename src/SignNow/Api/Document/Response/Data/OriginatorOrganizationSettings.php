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

readonly class OriginatorOrganizationSettings
{
    public function __construct(
        private string $setting,
        private string $value,
    ) {
    }

    public function getSetting(): string
    {
        return $this->setting;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
           'setting' => $this->getSetting(),
           'value' => $this->getValue(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['setting'],
            $data['value'],
        );
    }
}
