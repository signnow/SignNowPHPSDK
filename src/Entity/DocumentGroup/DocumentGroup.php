<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class DocumentGroup
 *
 * @HttpEntity("documentgroup/{id}", idProperty="id")
 *
 * @package SignNow\Api\Entity
 */
class DocumentGroup extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $groupName;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    private $documents = [];

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     *
     * @return DocumentGroup
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    /**
     * @param null|string $groupName
     *
     * @return DocumentGroup
     */
    public function setGroupName(?string $groupName): self
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    /**
     * @param null|array $documents
     *
     * @return DocumentGroup
     */
    public function setDocuments(?array $documents): self
    {
        $this->documents = $documents;

        return $this;
    }
}
