<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

readonly class Authentication
{
    public function __construct(
        private string $type,
        private string $value,
        private string $method = '',
        private string $phone = '',
        private string $message = '',
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
           'type' => $this->getType(),
           'value' => $this->getValue(),
           'method' => $this->getMethod(),
           'phone' => $this->getPhone(),
           'message' => $this->getMessage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['value'],
            $data['method'] ?? '',
            $data['phone'] ?? '',
            $data['message'] ?? '',
        );
    }
}
