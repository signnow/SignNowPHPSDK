<?php
declare(strict_types = 1);

namespace Examples\Invite;

use Examples\BaseExample;
use SignNow\Api\Entity\Invite\CancelInvite;
use SignNow\Api\Entity\Invite\Response;
use ReflectionException;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;

/**
 * Class CancelInviteExample
 *
 * @package Examples\Invite
 */
class CancelInviteExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = ['documentUid:'];
    
    /**
     * @return object|Response
     *
     * @throws ReflectionException
     * @throws EntityManagerException
     */
    public function execute(): Response
    {
        return $this->entityManager
            ->setUpdateHttpMethod(Request::METHOD_PUT)
            ->update(new CancelInvite(), ['documentId' => $this->arguments['documentUid']]);
    }
}
