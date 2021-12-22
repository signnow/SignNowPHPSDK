<?php
declare(strict_types=1);

namespace SignNow\Api\Action;

use ReflectionException;
use SignNow\Api\Action\Data\Document\DocumentDownloadLinkParams;
use SignNow\Api\Action\Data\Document\GetDocumentRequestParams;
use SignNow\Api\Entity\Document\Document as DocumentEntity;
use SignNow\Api\Entity\Document\Download as DocumentDownload;
use SignNow\Api\Entity\Document\DownloadLink as DocumentDownloadLink;
use SignNow\Api\Entity\Document\TextTag;
use SignNow\Api\Entity\Document\Upload as DocumentUpload;
use SignNow\Api\Entity\Document\FieldExtract as DocumentUploadFieldExtract;
use SignNow\Rest\Entity\Binary;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;
use SplFileInfo;

/**
 * Class Document
 *
 * @package SignNow\Api\Action
 */
class Document
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
     * @param string $filePath
     * 
     * @return DocumentEntity|object
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function upload(string $filePath): DocumentEntity
    {
        return $this->entityManager->create(
            new DocumentUpload(
                new SplFileInfo($filePath)
            )
        );
    }

    /**
     * @param string    $filePath
     * @param TextTag[] $textTags
     *
     * @return DocumentEntity|object
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function uploadWithTags(string $filePath, array $textTags): DocumentEntity
    {
        $tags = [];
        foreach ($textTags as $textTag) {
            $tags[] = $textTag->toArray();
        }
        
        return $this->entityManager->create(new DocumentUploadFieldExtract(new SplFileInfo($filePath), $tags));
    }

    /**
     * @param string $documentUniqueId
     * @param null|GetDocumentRequestParams $queryParams
     *
     * @return DocumentEntity|object
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function get(string $documentUniqueId, ?GetDocumentRequestParams $queryParams = null): DocumentEntity
    {
        return $this->entityManager->get(
            new DocumentEntity(),
            [
                'id' => $documentUniqueId,
            ],
            $queryParams === null ? [] : $queryParams->toArray()
        );
    }

    /**
     * @param string $documentUniqueId
     * @param array $fields [AbstractField::class]
     *
     * @return DocumentEntity|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function addFields(string $documentUniqueId, array $fields): DocumentEntity
    {
        $document = new DocumentEntity();
        $document->setId($documentUniqueId);
        $document->setFields($fields);
        
        $this->entityManager->setUpdateHttpMethod(Request::METHOD_PUT);
        
        return $this->entityManager->update($document);
    }
    
    /**
     * @param string $documentUniqueId
     *
     * @return void
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function delete(string $documentUniqueId): void
    {
        $this->entityManager->delete(
            new DocumentEntity(),
            [
                'id' => $documentUniqueId,
            ]
        );
    }
    
    /**
     * @param string $documentUniqueId
     * @param DocumentDownloadLinkParams|null $queryParams
     *
     * @return Binary|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function download(string $documentUniqueId, ?DocumentDownloadLinkParams $queryParams = null): Binary
    {
        return $this->entityManager->get(
            new DocumentDownload(),
            [
                'id' => $documentUniqueId,
            ],
            $queryParams === null ? [] : $queryParams->toArray()
        );
    }

    /**
     * Create a single-use link for document downloading
     * 
     * @param string $documentUniqueId
     *
     * @return object|DocumentDownloadLink
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function createDownloadLink(string $documentUniqueId): DocumentDownloadLink
    {
        return $this->entityManager->create(
            new DocumentDownloadLink(),
            [
                'id' => $documentUniqueId,
            ]
        );
    }
}
