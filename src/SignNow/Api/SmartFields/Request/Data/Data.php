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

namespace SignNow\Api\SmartFields\Request\Data;

readonly class Data
{
    public function __construct(
        private string $fieldName = '',
    ) {
    }

    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    public function toArray(): array
    {
        return [
           'field_name' => $this->getFieldName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['field_name'] ?? '',
        );
    }
}
