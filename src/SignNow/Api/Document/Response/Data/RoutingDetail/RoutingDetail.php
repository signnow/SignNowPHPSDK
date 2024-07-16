<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\RoutingDetail;

readonly class RoutingDetail
{
    public function __construct(
        private string $id,
        private DataCollection $data,
        private int $created,
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

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'data' => $this->getData()->toArray(),
           'created' => $this->getCreated(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            new DataCollection($data['data']),
            $data['created'],
        );
    }
}
