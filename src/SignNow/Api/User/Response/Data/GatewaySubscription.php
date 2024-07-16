<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class GatewaySubscription
{
    public function __construct(
        private string $gateway = '',
        private bool $autoRenew = false,
    ) {
    }

    public function getGateway(): string
    {
        return $this->gateway;
    }

    public function isAutoRenew(): bool
    {
        return $this->autoRenew;
    }

    public function toArray(): array
    {
        return [
           'gateway' => $this->getGateway(),
           'auto_renew' => $this->isAutoRenew(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['gateway'] ?? '',
            $data['auto_renew'] ?? false,
        );
    }
}
