<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Seal
{
    public function __construct(
        private string $id,
        private string $pageNumber,
        private string $x,
        private string $y,
        private string $width,
        private string $height,
        private string $created,
        private ?string $uniqueId = null,
        private ?string $customerUserId = null,
        private string $email = '',
        private ?string $transactionId = null,
        private string $data = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUniqueId(): ?string
    {
        return $this->uniqueId;
    }

    public function getCustomerUserId(): ?string
    {
        return $this->customerUserId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'unique_id' => $this->getUniqueId(),
           'customer_user_id' => $this->getCustomerUserId(),
           'email' => $this->getEmail(),
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'created' => $this->getCreated(),
           'transaction_id' => $this->getTransactionId(),
           'data' => $this->getData(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['created'],
            $data['unique_id'] ?? null,
            $data['customer_user_id'] ?? null,
            $data['email'] ?? '',
            $data['transaction_id'] ?? null,
            $data['data'] ?? '',
        );
    }
}
