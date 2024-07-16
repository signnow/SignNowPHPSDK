<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\FieldInvite;

readonly class EmbeddedSigner
{
    public function __construct(
        private string $firstName,
        private string $lastName,
    ) {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function toArray(): array
    {
        return [
           'first_name' => $this->getFirstName(),
           'last_name' => $this->getLastName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['first_name'],
            $data['last_name'],
        );
    }
}
