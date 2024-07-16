<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedGroupInvite\Response\Data;

readonly class DataInvite
{
    public function __construct(
        private string $id,
    ) {
    }

    public function getId(): string
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
            $data['id'],
        );
    }
}
