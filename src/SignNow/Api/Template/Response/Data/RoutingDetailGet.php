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

namespace SignNow\Api\Template\Response\Data;

readonly class RoutingDetailGet
{
    public function __construct(
        private string $name,
        private string $roleId,
        private string $defaultEmail,
        private bool $inviterRole,
        private int $signingOrder,
        private bool $declineBySignature = false,
        private ?string $deliveryType = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getDefaultEmail(): string
    {
        return $this->defaultEmail;
    }

    public function isInviterRole(): bool
    {
        return $this->inviterRole;
    }

    public function getSigningOrder(): int
    {
        return $this->signingOrder;
    }

    public function isDeclineBySignature(): bool
    {
        return $this->declineBySignature;
    }

    public function getDeliveryType(): ?string
    {
        return $this->deliveryType;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'role_id' => $this->getRoleId(),
           'default_email' => $this->getDefaultEmail(),
           'inviter_role' => $this->isInviterRole(),
           'signing_order' => $this->getSigningOrder(),
           'decline_by_signature' => $this->isDeclineBySignature(),
           'delivery_type' => $this->getDeliveryType(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['role_id'],
            $data['default_email'],
            $data['inviter_role'],
            $data['signing_order'],
            $data['decline_by_signature'] ?? false,
            $data['delivery_type'] ?? null,
        );
    }
}
