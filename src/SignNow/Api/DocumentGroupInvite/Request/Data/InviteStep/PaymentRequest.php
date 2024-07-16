<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

readonly class PaymentRequest
{
    public function __construct(
        private string $merchantId = '',
        private string $currency = '',
        private string $type = '',
        private string $amount = '',
    ) {
    }

    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function toArray(): array
    {
        return [
           'merchant_id' => $this->getMerchantId(),
           'currency' => $this->getCurrency(),
           'type' => $this->getType(),
           'amount' => $this->getAmount(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['merchant_id'] ?? '',
            $data['currency'] ?? '',
            $data['type'] ?? '',
            $data['amount'] ?? '',
        );
    }
}
