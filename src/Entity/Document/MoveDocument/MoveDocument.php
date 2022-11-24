<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\MoveDocument;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class MoveDocument
 *
 * @HttpEntity("/document/{documentUniqueId}/move", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Document\MoveDocument\MoveDocumentResponse")
 *
 * @package SignNow\Api\Entity\Document
 */
class MoveDocument extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $folderId;

    /**
     * @return string|null
     */
    public function getFolderId(): ?string
    {
        return $this->folderId;
    }

    /**
     * @param string $folderId
     *
     * @return $this
     */
    public function setFolderId(string $folderId): self
    {
        $this->folderId = $folderId;

        return $this;
    }
}
