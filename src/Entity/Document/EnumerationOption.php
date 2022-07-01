<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class EnumerationOption
 *
 * @package SignNow\Api\Entity\Document
 */
class EnumerationOption
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
    private $enumerationId;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $data = [];

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $created;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $updated;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $jsonAttributes;

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
     * @return EnumerationOption
     */
    public function setId(string $id): EnumerationOption
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEnumerationId(): ?string
    {
        return $this->enumerationId;
    }

    /**
     * @param string $enumerationId
     *
     * @return EnumerationOption
     */
    public function setEnumerationId(string $enumerationId): EnumerationOption
    {
        $this->enumerationId = $enumerationId;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return EnumerationOption
     */
    public function setData(array $data): EnumerationOption
    {
        $this->data = $data;

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
     * @return EnumerationOption
     */
    public function setCreated(string $created): EnumerationOption
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    /**
     * @param string $updated
     *
     * @return EnumerationOption
     */
    public function setUpdated(string $updated): EnumerationOption
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getJsonAttributes(): ?string
    {
        return $this->jsonAttributes;
    }

    /**
     * @param string $jsonAttributes
     *
     * @return EnumerationOption
     */
    public function setJsonAttributes(string $jsonAttributes): EnumerationOption
    {
        $this->jsonAttributes = $jsonAttributes;

        return $this;
    }
}
