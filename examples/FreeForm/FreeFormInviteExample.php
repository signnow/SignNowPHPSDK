<?php
declare(strict_types = 1);

namespace Examples\FreeForm;

use Examples\BaseExample;
use JMS\Serializer\SerializerBuilder;
use ReflectionException;
use SignNow\Api\Entity\FreeForm\Invite;
use SignNow\Api\Entity\FreeForm\InviteResponse;

/**
 * Class FreeFormInviteExample
 *
 * @package Examples\FreeForm
 */
class FreeFormInviteExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["documentId:", "from:", "to:"];
    
    /**
     * @return mixed
     * @throws ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute()
    {
        $documentId = $this->arguments['documentId'];
        $invite = (new Invite())
            ->setDocumentId($documentId)
            ->setTo($this->arguments['to'])
            ->setFrom($this->arguments['from'])
            ->setCc([])
            ->setSubject("Some subject")
            ->setMessage("Some message");
        
        /** @var InviteResponse $response */
        $response = $this->entityManager->create($invite, ["documentId" => $documentId]);
        
        return SerializerBuilder::create()->build()->toArray($response);
    }
}
