<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Invite;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SigningLink
 *
 * @HttpEntity("link", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Invite\SigningLinkResponse")
 *
 * @package SignNow\Api\Entity\Invite
 */
class SigningLink extends Entity
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $documentId;

    /**
     * SigningLink constructor.
     *
     * @param string $documentId
     */
    public function __construct(string $documentId)
    {
        $this->documentId = $documentId;
    }

    /**
     * @return string
     */
    public function getDocumentId(): string
    {
        return $this->documentId;
    }
}
