<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

readonly class RoutingDetailPost
{
    public function __construct(
        private string $defaultEmail,
        private bool $inviterRole,
        private string $name,
        private string $roleId,
        private int $signingOrder,
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

    public function toArray(): array
    {
        return [
           'default_email' => $this->getDefaultEmail(),
           'inviter_role' => $this->isInviterRole(),
           'name' => $this->getName(),
           'role_id' => $this->getRoleId(),
           'signing_order' => $this->getSigningOrder(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['default_email'],
            $data['inviter_role'],
            $data['name'],
            $data['role_id'],
            $data['signing_order'],
        );
    }
}
