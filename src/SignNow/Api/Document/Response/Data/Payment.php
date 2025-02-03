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

namespace SignNow\Api\Document\Response\Data;

readonly class Payment
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $email,
        private string $created,
        private string $amount,
        private ?string $paymentRequestId = null,
        private ?string $merchantId = null,
        private ?string $merchantType = null,
        private ?string $merchantAccountName = null,
        private ?string $currencyName = null,
        private ?string $currency = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getPaymentRequestId(): ?string
    {
        return $this->paymentRequestId;
    }

    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    public function getMerchantType(): ?string
    {
        return $this->merchantType;
    }

    public function getMerchantAccountName(): ?string
    {
        return $this->merchantAccountName;
    }

    public function getCurrencyName(): ?string
    {
        return $this->currencyName;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'email' => $this->getEmail(),
           'created' => $this->getCreated(),
           'amount' => $this->getAmount(),
           'payment_request_id' => $this->getPaymentRequestId(),
           'merchant_id' => $this->getMerchantId(),
           'merchant_type' => $this->getMerchantType(),
           'merchant_account_name' => $this->getMerchantAccountName(),
           'currency_name' => $this->getCurrencyName(),
           'currency' => $this->getCurrency(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['email'],
            $data['created'],
            $data['amount'],
            $data['payment_request_id'] ?? null,
            $data['merchant_id'] ?? null,
            $data['merchant_type'] ?? null,
            $data['merchant_account_name'] ?? null,
            $data['currency_name'] ?? null,
            $data['currency'] ?? null,
        );
    }
}
