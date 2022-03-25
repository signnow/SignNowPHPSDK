<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Template;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Copy
 *
 * @HttpEntity("template/{templateId}/copy", idProperty="templateId")
 * @ResponseType("SignNow\Api\Entity\Document\Document")
 *
 * @package SignNow\Api\Entity\Template
 */
class Copy extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $templateId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $documentName;

    /**
     * @param string $documentName
     *
     * @return Copy
     */
    public function setDocumentName(string $documentName): Copy
    {
        $this->documentName = $documentName;

        return $this;
    }

    /**
     * @param string $templateId
     *
     * @return Copy
     */
    public function setTemplateId(string $templateId): Copy
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
}
