<?php
declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Entity\Document\Document as DocumentEntity;
use SignNow\Api\Entity\Template\Copy as TemplateCopyEntity;
use SignNow\Api\Entity\Template\Template as TemplateEntity;
use SignNow\Api\Service\EntityManager\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class Template
 *
 * @package SignNow\Api\Action
 */
class Template
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Document constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $documentUniqueId of the document which is the source of a template
     * @param string $newTemplateName
     *
     * @return DocumentEntity|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(string $documentUniqueId, string $newTemplateName): DocumentEntity
    {
        $template = (new TemplateEntity())
            ->setDocumentId($documentUniqueId)
            ->setDocumentName($newTemplateName);

        return $this->entityManager->create($template);
    }

    /**
     * @param string $documentUniqueId of the template which is the source of a new document
     * @param string $newDocumentName
     *
     * @return DocumentEntity|object
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function generateDocument(string $documentUniqueId, string $newDocumentName): DocumentEntity
    {
        $templateCopy = (new TemplateCopyEntity())
            ->setTemplateId($documentUniqueId)
            ->setDocumentName($newDocumentName);
        
        return $this->entityManager->create($templateCopy);
    }
}
