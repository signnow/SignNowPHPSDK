<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\Invite;

use SignNow\Rest\Entity\Entity;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Invite
 *
 * @package SignNow\Api\Entity\Embedded\Invite
 */
class Invite extends Entity
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $roleId;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $order;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $status;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getRoleId(): string
    {
        return $this->roleId;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
