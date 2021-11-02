<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Invite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Invite
 *
 * @HttpEntity("document/{documentId}/invite", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Invite\Response")
 *
 * @package SignNow\Api\Entity\Invite
 */
class Invite extends Entity
{
    /**
     * @var Recipient[]
     * @Serializer\Type("array<SignNow\Api\Entity\Invite\Recipient>")
     */
    protected $to;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $from;
    
    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $cc;
    
    /**
     * Invite constructor.
     *
     * @param string $from
     * @param array  $to
     * @param array  $cc
     */
    public function __construct(string $from, array $to, array $cc = [])
    {
        $this->from = $from;
        $this->to = $to;
        $this->cc = $cc;
    }
    
    /**
     * @return Recipient[]
     */
    public function getTo(): array
    {
        return $this->to;
    }
    
    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }
    
    /**
     * @return array
     */
    public function getCc(): array
    {
        return $this->cc;
    }
}
