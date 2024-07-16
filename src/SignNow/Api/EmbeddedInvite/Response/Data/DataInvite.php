<?php

declare(strict_types=1);

namespace SignNow\Api\EmbeddedInvite\Response\Data;

readonly class DataInvite
{
    public function __construct(
        private string $id,
        private string $email,
        private string $roleId,
        private int $order,
        private string $status,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'email' => $this->getEmail(),
           'role_id' => $this->getRoleId(),
           'order' => $this->getOrder(),
           'status' => $this->getStatus(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['email'],
            $data['role_id'],
            $data['order'],
            $data['status'],
        );
    }
}
