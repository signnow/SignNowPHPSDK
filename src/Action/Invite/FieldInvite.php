<?php
declare(strict_types=1);

namespace SignNow\Api\Action\Invite;

use ReflectionException;
use SignNow\Api\Entity\Invite\CancelInvite;
use SignNow\Api\Entity\Invite\Invite;
use SignNow\Api\Entity\FreeForm\Invite as FreeFormInvite;
use SignNow\Api\Entity\Invite\Recipient;
use SignNow\Api\Entity\Invite\Response;
use SignNow\Api\Entity\FreeForm\InviteResponse as FreeFormResponse;
use SignNow\Api\Entity\Invite\SigningLinkResponse;
use SignNow\Api\Entity\Invite\SigningLink;
use SignNow\Rest\EntityManager;
use SignNow\Rest\EntityManager\Exception\EntityManagerException;
use SignNow\Rest\Http\Request;

/**
 * Class FieldInvite
 *
 * @package SignNow\Api\Action\Invite
 */
class FieldInvite
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * FieldInvite constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string      $documentUniqueId
     * @param string      $fromEmail
     * @param Recipient[] $to
     * @param array       $cc
     *
     * @return Response|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function create(string $documentUniqueId, string $fromEmail, array $to, array $cc = []): Response
    {
        $fieldInvite = new Invite($fromEmail, $to, $cc);

        return $this->entityManager->create(
            $fieldInvite,
            [
                'documentId' => $documentUniqueId,
            ]
        );
    }

    /**
     * @param string $documentUniqueId
     *
     * @return SigningLinkResponse|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function createSigningLink(string $documentUniqueId): SigningLinkResponse
    {
        return $this->entityManager->create(
            new SigningLink($documentUniqueId)
        );
    }

    /**
     * @param FreeFormInvite $freeFormInvite
     *
     * @return Response|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function createFreeFormInvite(FreeFormInvite $freeFormInvite): FreeFormResponse
    {
        return $this->entityManager->create(
            $freeFormInvite,
            [
                'documentId' => $freeFormInvite->getDocumentId(),
            ]
        );
    }
    
    /**
     * @param string $documentUniqueId
     *
     * @return Response|object
     * @throws EntityManagerException
     * @throws ReflectionException
     */
    public function cancelInvite(string $documentUniqueId): Response
    {
        return $this->entityManager
            ->setUpdateHttpMethod(Request::METHOD_PUT)
            ->update(new CancelInvite(), ['documentId' => $documentUniqueId]);
    }
}
