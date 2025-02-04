<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

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
