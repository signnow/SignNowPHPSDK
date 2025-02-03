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

namespace SignNow\Api\Document\Response\Data\RoutingDetail;

readonly class RoutingDetail
{
    public function __construct(
        private string $id,
        private DataCollection $data,
        private int $created,
        private int $updated,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getData(): DataCollection
    {
        return $this->data;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'data' => $this->getData()->toArray(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            new DataCollection($data['data']),
            $data['created'],
            $data['updated'],
        );
    }
}
