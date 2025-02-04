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

namespace SignNow\Api\User\Response\Data\MerchantAccount;

readonly class MerchantAccount
{
    public function __construct(
        private string $id,
        private string $scope,
        private string $merchantType,
        private string $merchantAccountName,
        private CurrencyCollection $currencies,
        private string $currency,
        private string $currencyName,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getMerchantType(): string
    {
        return $this->merchantType;
    }

    public function getMerchantAccountName(): string
    {
        return $this->merchantAccountName;
    }

    public function getCurrencies(): CurrencyCollection
    {
        return $this->currencies;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getCurrencyName(): string
    {
        return $this->currencyName;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'scope' => $this->getScope(),
           'merchant_type' => $this->getMerchantType(),
           'merchant_account_name' => $this->getMerchantAccountName(),
           'currencies' => $this->getCurrencies()->toArray(),
           'currency' => $this->getCurrency(),
           'currency_name' => $this->getCurrencyName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['scope'],
            $data['merchant_type'],
            $data['merchant_account_name'],
            new CurrencyCollection($data['currencies']),
            $data['currency'],
            $data['currency_name'],
        );
    }
}
