<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Integration
 *
 * @package SignNow\Api\Entity\Document
 */
class Integration
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var null|array
     * @Serializer\Type("array")
     */
    private $data;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $integrationId;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return Integration
     */
    public function setId(?string $id): Integration
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     *
     * @return Integration
     */
    public function setData(?array $data): Integration
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }

    /**
     * @param string|null $integrationId
     *
     * @return Integration
     */
    public function setIntegrationId(?string $integrationId): Integration
    {
        $this->integrationId = $integrationId;

        return $this;
    }
}
