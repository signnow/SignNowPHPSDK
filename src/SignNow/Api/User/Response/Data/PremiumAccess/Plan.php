<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\PremiumAccess;

readonly class Plan
{
    public function __construct(
        private int $id,
        private string $planId,
        private string $name,
        private string $price,
        private int $billingCycle,
        private bool $active,
        private GroupCollection $groups,
        private string $level,
        private string $type,
        private int $apiRequests,
        private int $unitPrice,
        private bool $isTrial,
        private bool $isMarketplace,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPlanId(): string
    {
        return $this->planId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getBillingCycle(): int
    {
        return $this->billingCycle;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getGroups(): GroupCollection
    {
        return $this->groups;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getApiRequests(): int
    {
        return $this->apiRequests;
    }

    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    public function isTrial(): bool
    {
        return $this->isTrial;
    }

    public function isMarketplace(): bool
    {
        return $this->isMarketplace;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'plan_id' => $this->getPlanId(),
           'name' => $this->getName(),
           'price' => $this->getPrice(),
           'billing_cycle' => $this->getBillingCycle(),
           'active' => $this->isActive(),
           'groups' => $this->getGroups()->toArray(),
           'level' => $this->getLevel(),
           'type' => $this->getType(),
           'api_requests' => $this->getApiRequests(),
           'unit_price' => $this->getUnitPrice(),
           'is_trial' => $this->IsTrial(),
           'is_marketplace' => $this->IsMarketplace(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['plan_id'],
            $data['name'],
            $data['price'],
            $data['billing_cycle'],
            $data['active'],
            new GroupCollection($data['groups']),
            $data['level'],
            $data['type'],
            $data['api_requests'],
            $data['unit_price'],
            $data['is_trial'],
            $data['is_marketplace'],
        );
    }
}
