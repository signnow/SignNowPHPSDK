<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\PremiumAccess;

readonly class GatewaySubscription
{
    public function __construct(
        private ?string $gateway = null,
        private ?bool $autoRenew = null,
    ) {
    }

    public function getGateway(): ?string
    {
        return $this->gateway;
    }

    public function isAutoRenew(): ?bool
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
            $data['gateway'] ?? null,
            $data['auto_renew'] ?? null,
        );
    }
}
