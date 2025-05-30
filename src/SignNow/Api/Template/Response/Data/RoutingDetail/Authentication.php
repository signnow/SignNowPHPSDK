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

namespace SignNow\Api\Template\Response\Data\RoutingDetail;

readonly class Authentication
{
    public function __construct(
        private ?string $type = null,
    ) {
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'] ?? null,
        );
    }
}
