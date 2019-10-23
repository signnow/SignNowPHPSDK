<?php
declare(strict_types = 1);

namespace Examples\Document;

use Examples\BaseExample;
use SignNow\Api\Entity\Document\Document;
use SignNow\Api\Entity\Document\Field\InitialsField;
use SignNow\Api\Entity\Document\Field\SignatureField;
use SignNow\Api\Entity\Document\Field\TextField;

/**
 * Class AddFieldsExample
 *
 * @package Examples\Document
 */
class AddFieldsExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ['document_id:'];
    
    /**
     * @return mixed|object
     *
     * @throws \ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute()
    {
        $document = (new Document())
            ->setId($this->arguments['document_id']);
        
        $signature = (new SignatureField())
            ->setName('My Signature')
            ->setPageNumber(0)
            ->setRole('role 1')
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(10)
            ->setX(5)
            ->setY(10);

        $initials = (new InitialsField())
            ->setName('My Initial')
            ->setPageNumber(0)
            ->setRole('role 1')
            ->setHeight(200)
            ->setWidth(100)
            ->setX(50)
            ->setY(100);
        
        $text = (new TextField())
            ->setName('My text')
            ->setLabel('Some label')
            ->setPrefilledText('prefilled text')
            ->setPageNumber(0)
            ->setRole('role 1')
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(10)
            ->setX(100)
            ->setY(150);
        
        $document->setFields([
            $signature,
            $initials,
            $text,
        ]);
        
        return $this->entityManager->update($document);
    }
}
