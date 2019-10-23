<?php
declare(strict_types = 1);

namespace Examples\Document\Upload;

use \ReflectionException;
use Examples\BaseExample;
use SignNow\Api\Entity\Document\Document;
use SignNow\Api\Entity\Document\Upload;

/**
 * Class UploadExample
 *
 * @package Examples\Document\Upload
 */
class UploadExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ['filePath:'];

    /**
     * @return object|Document
     *
     * @throws ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute()
    {
        $document = new Upload(new \SplFileInfo($this->arguments['filePath']));
        
        return $this->entityManager->create($document);
    }
}
