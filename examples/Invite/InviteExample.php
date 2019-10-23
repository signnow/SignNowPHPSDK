<?php
declare(strict_types = 1);

namespace Examples\Invite;

use Examples\BaseExample;
use ReflectionException;
use SignNow\Api\Entity\Invite\Invite;
use SignNow\Api\Entity\Invite\Recipient;
use SignNow\Api\Entity\Invite\Response;

/**
 * Class InviteExample
 *
 * @package Examples\Invite
 */
class InviteExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ["recipient_email:", "role:", "roleId:", "documentUid:", "email:"];
    
    /**
     * @var array
     */
    protected $additionalParameters = ["order:", "cc:"];
    
    /**
     * @return object|Response
     * @throws ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute(): Response
    {
        $to[] = new Recipient(
            $this->arguments['recipient_email'],
            $this->arguments['role'],
            $this->arguments['roleId'] ?? '',
            $this->arguments['order'] ?? null
        );
        $cc = isset($this->arguments['cc']) ? explode(",", $this->arguments['cc']) : [];
        $fieldInvite = new Invite($this->arguments['email'], $to, $cc);
        
        return $this->entityManager->create($fieldInvite, ['documentId' => $this->arguments['documentUid']]);
    }
}
