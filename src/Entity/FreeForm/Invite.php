<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\FreeForm;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Invite
 *
 * @HttpEntity("document/{documentId}/invite", idProperty="")
 * @ResponseType("SignNow\Api\Entity\FreeForm\InviteResponse")
 *
 * @package SignNow\Api\Entity\FreeForm
 */
class Invite extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $documentId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $to;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $from;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $cc;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $subject;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $message;

    /**
     * @return string|null
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * @param string $documentId
     *
     * @return Invite
     */
    public function setDocumentId(string $documentId): self
    {
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }

    /**
     * @param string $to
     *
     * @return Invite
     */
    public function setTo(string $to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return Invite
     */
    public function setFrom(string $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    /**
     * @param array $cc
     *
     * @return Invite
     */
    public function setCc(array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return Invite
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return Invite
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
