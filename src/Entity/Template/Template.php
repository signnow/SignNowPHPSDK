<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Template;

use SignNow\Api\Entity\Document\Document;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Template
 *
 * @HttpEntity("template", idProperty="")
 * @GuzzleRequestBody("form_params")
 * @ResponseType("SignNow\Api\Entity\Document\Document")
 *
 * @package SignNow\Api\Entity
 */
class Template extends Entity
{
    /**
     * @var string
     */
    protected $documentName;

    /**
     * @var string
     */
    protected $documentId;

    /**
     * @param Document $document
     */
    public function setDocument(Document $document): void
    {
        $this->setDocumentName($document->getDocumentName());
        $this->setDocumentId($document->getId());
    }

    /**
     * @param string $documentName
     *
     * @return Template
     */
    public function setDocumentName(string $documentName): Template
    {
        $this->documentName = $documentName;
        
        return $this;
    }
    
    /**
     * @param string $documentId
     *
     * @return Template
     */
    public function setDocumentId(string $documentId): Template
    {
        $this->documentId = $documentId;
        
        return $this;
    }
}
