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

namespace SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite;

readonly class Invite
{
    public function __construct(
        private int $order,
        private SignerCollection $signers,
    ) {
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getSigners(): SignerCollection
    {
        return $this->signers;
    }

    public function toArray(): array
    {
        return [
           'order' => $this->getOrder(),
           'signers' => $this->getSigners()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['order'],
            new SignerCollection($data['signers']),
        );
    }
}
