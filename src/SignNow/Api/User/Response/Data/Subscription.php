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

namespace SignNow\Api\User\Response\Data;

readonly class Subscription
{
    public function __construct(
        private string $id,
        private string $subscriptionId,
        private string $name,
        private int $expired,
        private int $created,
        private int $updated,
        private string $plan,
        private string $mobilePlanType,
        private bool $creditCard,
        private bool $trial,
        private int $term,
        private string $seatAdminEmail,
        private int $planVersion,
        private bool $isUsageBased,
        private bool $isUsageBasedSeatFree,
        private ?GatewaySubscription $gatewaySubscription = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getExpired(): int
    {
        return $this->expired;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function getPlan(): string
    {
        return $this->plan;
    }

    public function getMobilePlanType(): string
    {
        return $this->mobilePlanType;
    }

    public function isCreditCard(): bool
    {
        return $this->creditCard;
    }

    public function isTrial(): bool
    {
        return $this->trial;
    }

    public function getTerm(): int
    {
        return $this->term;
    }

    public function getSeatAdminEmail(): string
    {
        return $this->seatAdminEmail;
    }

    public function getPlanVersion(): int
    {
        return $this->planVersion;
    }

    public function isUsageBased(): bool
    {
        return $this->isUsageBased;
    }

    public function isUsageBasedSeatFree(): bool
    {
        return $this->isUsageBasedSeatFree;
    }

    public function getGatewaySubscription(): ?GatewaySubscription
    {
        return $this->gatewaySubscription;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'subscription_id' => $this->getSubscriptionId(),
           'name' => $this->getName(),
           'expired' => $this->getExpired(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'plan' => $this->getPlan(),
           'mobile_plan_type' => $this->getMobilePlanType(),
           'credit_card' => $this->isCreditCard(),
           'trial' => $this->isTrial(),
           'term' => $this->getTerm(),
           'seat_admin_email' => $this->getSeatAdminEmail(),
           'plan_version' => $this->getPlanVersion(),
           'is_usage_based' => $this->IsUsageBased(),
           'is_usage_based_seat_free' => $this->IsUsageBasedSeatFree(),
           'gateway_subscription' => $this->getGatewaySubscription(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['subscription_id'],
            $data['name'],
            $data['expired'],
            $data['created'],
            $data['updated'],
            $data['plan'],
            $data['mobile_plan_type'],
            $data['credit_card'],
            $data['trial'],
            $data['term'],
            $data['seat_admin_email'],
            $data['plan_version'],
            $data['is_usage_based'],
            $data['is_usage_based_seat_free'],
            isset($data['gateway_subscription']) ? GatewaySubscription::fromArray($data['gateway_subscription']) : null,
        );
    }
}
