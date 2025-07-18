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

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

readonly class Organization
{
    public function __construct(
        private ?string $id = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? null,
        );
    }
}
