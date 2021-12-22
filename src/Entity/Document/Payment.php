<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Payment
 *
 * @package SignNow\Api\Entity\Document
 */
class Payment
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $userId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $created;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $amount;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $paymentRequestId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $merchantId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $merchantType;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $merchantAccountName;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $currencyName;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Payment
     */
    public function setId(string $id): Payment
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return Payment
     */
    public function setUserId(string $userId): Payment
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Payment
     */
    public function setEmail(string $email): Payment
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string $created
     *
     * @return Payment
     */
    public function setCreated(string $created): Payment
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     *
     * @return Payment
     */
    public function setAmount(string $amount): Payment
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPaymentRequestId(): ?string
    {
        return $this->paymentRequestId;
    }

    /**
     * @param string $paymentRequestId
     *
     * @return Payment
     */
    public function setPaymentRequestId(string $paymentRequestId): Payment
    {
        $this->paymentRequestId = $paymentRequestId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     *
     * @return Payment
     */
    public function setMerchantId(string $merchantId): Payment
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMerchantType(): ?string
    {
        return $this->merchantType;
    }

    /**
     * @param string $merchantType
     *
     * @return Payment
     */
    public function setMerchantType(string $merchantType): Payment
    {
        $this->merchantType = $merchantType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMerchantAccountName(): ?string
    {
        return $this->merchantAccountName;
    }

    /**
     * @param string $merchantAccountName
     *
     * @return Payment
     */
    public function setMerchantAccountName(string $merchantAccountName): Payment
    {
        $this->merchantAccountName = $merchantAccountName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCurrencyName(): ?string
    {
        return $this->currencyName;
    }

    /**
     * @param string $currencyName
     *
     * @return Payment
     */
    public function setCurrencyName(string $currencyName): Payment
    {
        $this->currencyName = $currencyName;

        return $this;
    }
}
