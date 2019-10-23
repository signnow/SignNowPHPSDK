<?php
declare(strict_types = 1);

namespace Examples\Invite;

use Examples\BaseExample;
use SignNow\Api\Entity\Invite\SigningLink;
use SignNow\Api\Entity\Invite\SigningLinkResponse;
use ReflectionException;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;

/**
 * Class SigningLinkExample
 *
 * @package Examples\Invite
 */
class SigningLinkExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ['documentUid:'];
    
    /**
     * @return SigningLinkResponse|object
     *
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function execute(): SigningLinkResponse
    {
        return $this->entityManager->create(new SigningLink($this->arguments['documentUid']));
    }
}
