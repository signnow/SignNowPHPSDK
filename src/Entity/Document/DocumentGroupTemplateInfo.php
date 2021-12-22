<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class DocumentGroupTemplateInfo
 *
 * @package SignNow\Api\Entity\Document
 */
class DocumentGroupTemplateInfo
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $documentGroupTemplateId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $documentGroupTemplateName;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $shared;

    /**
     * @return string|null
     */
    public function getDocumentGroupTemplateId(): ?string
    {
        return $this->documentGroupTemplateId;
    }

    /**
     * @param string|null $documentGroupTemplateId
     *
     * @return DocumentGroupTemplateInfo
     */
    public function setDocumentGroupTemplateId(?string $documentGroupTemplateId): DocumentGroupTemplateInfo
    {
        $this->documentGroupTemplateId = $documentGroupTemplateId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDocumentGroupTemplateName(): ?string
    {
        return $this->documentGroupTemplateName;
    }

    /**
     * @param string|null $documentGroupTemplateName
     *
     * @return DocumentGroupTemplateInfo
     */
    public function setDocumentGroupTemplateName(?string $documentGroupTemplateName): DocumentGroupTemplateInfo
    {
        $this->documentGroupTemplateName = $documentGroupTemplateName;

        return $this;
    }

    /**
     * @return int
     */
    public function getShared(): int
    {
        return $this->shared;
    }

    /**
     * @param int $shared
     *
     * @return DocumentGroupTemplateInfo
     */
    public function setShared(int $shared): DocumentGroupTemplateInfo
    {
        $this->shared = $shared;

        return $this;
    }
}
