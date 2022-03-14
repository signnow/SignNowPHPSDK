<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Request
 *
 * @package SignNow\Api\Entity\Document
 */
class Request
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
    private $uniqueId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $userId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $created;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $originatorEmail;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $signerEmail;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $canceled;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $redirectUri;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $signatureId;

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
     * @return Request
     */
    public function setId(string $id): Request
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUniqueId(): ?string
    {
        return $this->uniqueId;
    }

    /**
     * @param string $uniqueId
     *
     * @return Request
     */
    public function setUniqueId(string $uniqueId): Request
    {
        $this->uniqueId = $uniqueId;

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
     * @return Request
     */
    public function setUserId(string $userId): Request
    {
        $this->userId = $userId;

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
     * @return Request
     */
    public function setCreated(string $created): Request
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOriginatorEmail(): ?string
    {
        return $this->originatorEmail;
    }

    /**
     * @param string $originatorEmail
     *
     * @return Request
     */
    public function setOriginatorEmail(string $originatorEmail): Request
    {
        $this->originatorEmail = $originatorEmail;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSignerEmail(): ?string
    {
        return $this->signerEmail;
    }

    /**
     * @param string $signerEmail
     *
     * @return Request
     */
    public function setSignerEmail(string $signerEmail): Request
    {
        $this->signerEmail = $signerEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCanceled(): ?string
    {
        return $this->canceled;
    }

    /**
     * @param string|null $canceled
     *
     * @return Request
     */
    public function setCanceled(?string $canceled): Request
    {
        $this->canceled = $canceled;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    /**
     * @param string $redirectUri
     *
     * @return Request
     */
    public function setRedirectUri(string $redirectUri): Request
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSignatureId(): ?string
    {
        return $this->signatureId;
    }

    /**
     * @param string $signatureId
     *
     * @return Request
     */
    public function setSignatureId(string $signatureId): Request
    {
        $this->signatureId = $signatureId;

        return $this;
    }
}
