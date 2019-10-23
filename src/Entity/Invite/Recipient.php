<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Invite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Recipient
 *
 * @package SignNow\Api\Entity\Invite
 */
class Recipient
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $email;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $role;
    
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    protected $order;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $roleId;
    
    /**
     * Recipient constructor.
     *
     * @param string   $email
     * @param string   $role
     * @param string   $roleId
     * @param int|null $order
     */
    public function __construct(string $email, string $role, string $roleId, ?int $order = null)
    {
        $this->email = $email;
        $this->role = $role;
        $this->roleId = $roleId;
        $this->order = $order > 0 ? $order : 1;
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
    public function getRole(): string
    {
        return $this->role;
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
    public function getRoleId(): string
    {
        return $this->roleId;
    }
}
