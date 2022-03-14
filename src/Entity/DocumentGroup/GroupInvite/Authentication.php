<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class Authentication
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class Authentication extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $phone;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $method;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $value;

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Authentication
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Authentication
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return Authentication
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return Authentication
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
