<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\PremiumAccess;

readonly class Subscription
{
    public function __construct(
        private string $serialNumber,
        private string $name,
        private int $term,
        private int $seats,
        private int $usedSeats,
        private int $expiredAt,
        private int $createdAt,
        private int $updatedAt,
        private string $key,
        private string $version,
        private Plan $plan,
        private string $adminEmail,
        private string $status,
        private ?Marketplace $marketplace = null,
        private ?GatewaySubscription $gatewaySubscription = null,
    ) {
    }

    public function getSerialNumber(): string
    {
        return $this->serialNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTerm(): int
    {
        return $this->term;
    }

    public function getSeats(): int
    {
        return $this->seats;
    }

    public function getUsedSeats(): int
    {
        return $this->usedSeats;
    }

    public function getExpiredAt(): int
    {
        return $this->expiredAt;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getPlan(): Plan
    {
        return $this->plan;
    }

    public function getAdminEmail(): string
    {
        return $this->adminEmail;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getMarketplace(): ?Marketplace
    {
        return $this->marketplace;
    }

    public function getGatewaySubscription(): ?GatewaySubscription
    {
        return $this->gatewaySubscription;
    }

    public function toArray(): array
    {
        return [
           'serial_number' => $this->getSerialNumber(),
           'name' => $this->getName(),
           'term' => $this->getTerm(),
           'seats' => $this->getSeats(),
           'used_seats' => $this->getUsedSeats(),
           'expired_at' => $this->getExpiredAt(),
           'created_at' => $this->getCreatedAt(),
           'updated_at' => $this->getUpdatedAt(),
           'key' => $this->getKey(),
           'version' => $this->getVersion(),
           'plan' => $this->getPlan(),
           'admin_email' => $this->getAdminEmail(),
           'status' => $this->getStatus(),
           'marketplace' => $this->getMarketplace(),
           'gateway_subscription' => $this->getGatewaySubscription(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['serial_number'],
            $data['name'],
            $data['term'],
            $data['seats'],
            $data['used_seats'],
            $data['expired_at'],
            $data['created_at'],
            $data['updated_at'],
            $data['key'],
            $data['version'],
            Plan::fromArray($data['plan']),
            $data['admin_email'],
            $data['status'],
            isset($data['marketplace']) ? Marketplace::fromArray($data['marketplace']) : null,
            isset($data['gateway_subscription']) ? GatewaySubscription::fromArray($data['gateway_subscription']) : null,
        );
    }
}
