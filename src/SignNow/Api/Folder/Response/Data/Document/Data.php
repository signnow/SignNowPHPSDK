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

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Data
{
    public function __construct(
        private ?string $name = null,
        private ?bool $inviterRole = null,
        private ?int $signingOrder = null,
        private ?string $deliveryType = null,
        private ?string $defaultEmail = null,
        private ?string $roleId = null,
        private ?bool $declineBySignature = null,
        private ?bool $reassign = null,
        private ?int $expirationDays = null,
        private ?Reminder $reminder = null,
    ) {
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function isInviterRole(): ?bool
    {
        return $this->inviterRole;
    }

    public function getSigningOrder(): ?int
    {
        return $this->signingOrder;
    }

    public function getDeliveryType(): ?string
    {
        return $this->deliveryType;
    }

    public function getDefaultEmail(): ?string
    {
        return $this->defaultEmail;
    }

    public function getRoleId(): ?string
    {
        return $this->roleId;
    }

    public function isDeclineBySignature(): ?bool
    {
        return $this->declineBySignature;
    }

    public function isReassign(): ?bool
    {
        return $this->reassign;
    }

    public function getExpirationDays(): ?int
    {
        return $this->expirationDays;
    }

    public function getReminder(): ?Reminder
    {
        return $this->reminder;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'inviter_role' => $this->isInviterRole(),
           'signing_order' => $this->getSigningOrder(),
           'delivery_type' => $this->getDeliveryType(),
           'default_email' => $this->getDefaultEmail(),
           'role_id' => $this->getRoleId(),
           'decline_by_signature' => $this->isDeclineBySignature(),
           'reassign' => $this->isReassign(),
           'expiration_days' => $this->getExpirationDays(),
           'reminder' => $this->getReminder(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['inviter_role'] ?? null,
            $data['signing_order'] ?? null,
            $data['delivery_type'] ?? null,
            $data['default_email'] ?? null,
            $data['role_id'] ?? null,
            $data['decline_by_signature'] ?? null,
            $data['reassign'] ?? null,
            $data['expiration_days'] ?? null,
            isset($data['reminder']) ? Reminder::fromArray($data['reminder']) : null,
        );
    }
}
