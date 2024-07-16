<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

readonly class RoutingDetailGet
{
    public function __construct(
        private bool $inviterRole,
        private string $name,
        private string $roleId,
        private int $signingOrder,
        private string $defaultEmail = '',
        private bool $declineBySignature = false,
        private ?string $deliveryType = null,
    ) {
    }

    public function getDefaultEmail(): string
    {
        return $this->defaultEmail;
    }

    public function isInviterRole(): bool
    {
        return $this->inviterRole;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
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
           'default_email' => $this->getDefaultEmail(),
           'inviter_role' => $this->isInviterRole(),
           'name' => $this->getName(),
           'role_id' => $this->getRoleId(),
           'signing_order' => $this->getSigningOrder(),
           'decline_by_signature' => $this->isDeclineBySignature(),
           'delivery_type' => $this->getDeliveryType(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['inviter_role'],
            $data['name'],
            $data['role_id'],
            $data['signing_order'],
            $data['default_email'] ?? '',
            $data['decline_by_signature'] ?? false,
            $data['delivery_type'] ?? null,
        );
    }
}
