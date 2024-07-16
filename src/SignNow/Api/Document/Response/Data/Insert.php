<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Insert
{
    public function __construct(
        private string $id,
        private string $location,
        private string $email = '',
        private ?string $transactionId = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'location' => $this->getLocation(),
           'email' => $this->getEmail(),
           'transaction_id' => $this->getTransactionId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['location'],
            $data['email'] ?? '',
            $data['transaction_id'] ?? null,
        );
    }
}
