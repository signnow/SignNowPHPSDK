<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CreateDocumentGroup
 *
 * @HttpEntity("documentgroup", idProperty="")
 *
 * @package SignNow\Api\Entity\DocumentGroup
 */
class CreateDocumentGroup extends Entity
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("group_name")
     */
    private $groupName;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("document_ids")
     */
    private $documentIds = [];

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
     * @return CreateDocumentGroup
     */
    public function setId(string $id): self
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
     * @param string $groupName
     *
     * @return CreateDocumentGroup
     */
    public function setGroupName(string $groupName): self
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * @return array
     */
    public function getDocumentIds(): array
    {
        return $this->documentIds;
    }

    /**
     * @param array $documentIds
     *
     * @return CreateDocumentGroup
     */
    public function setDocumentIds(array $documentIds): self
    {
        $this->documentIds = $documentIds;

        return $this;
    }
}
