<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

readonly class ApproverPut
{
    public function __construct(
        private string $defaultEmail,
        private string $name,
        private int $signingOrder,
    ) {
    }

    public function getDefaultEmail(): string
    {
        return $this->defaultEmail;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSigningOrder(): int
    {
        return $this->signingOrder;
    }

    public function toArray(): array
    {
        return [
           'default_email' => $this->getDefaultEmail(),
           'name' => $this->getName(),
           'signing_order' => $this->getSigningOrder(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['default_email'],
            $data['name'],
            $data['signing_order'],
        );
    }
}
