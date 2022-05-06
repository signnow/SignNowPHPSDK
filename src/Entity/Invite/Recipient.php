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
     * @var int
     * @Serializer\Type("int")
     */
    protected $expirationDays;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $subject;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $message;

    /**
     * Recipient constructor.
     *
     * @param string      $email
     * @param string      $role
     * @param string      $roleId
     * @param int|null    $order
     * @param int|null    $expirationDays
     * @param string|null $subject
     * @param string|null $message
     */
    public function __construct(
        string  $email,
        string  $role,
        string  $roleId,
        ?int    $order = null,
        ?int    $expirationDays = null,
        ?string $subject = null,
        ?string $message = null
    )
    {
        $this->email = $email;
        $this->role = $role;
        $this->roleId = $roleId;
        $this->order = $order > 0 ? $order : 1;
        $this->expirationDays = $expirationDays;
        $this->subject = $subject;
        $this->message = $message;
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

    /**
     * @return int|null
     */
    public function getExpirationDays(): ?int
    {
        return $this->expirationDays;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param int|null $order
     *
     * @return Recipient
     */
    public function setOrder(?int $order): Recipient
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @param int|null $expirationDays
     *
     * @return Recipient
     */
    public function setExpirationDays(?int $expirationDays): Recipient
    {
        $this->expirationDays = $expirationDays;

        return $this;
    }

    /**
     * @param string|null $subject
     *
     * @return Recipient
     */
    public function setSubject(?string $subject): Recipient
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @param string|null $message
     *
     * @return Recipient
     */
    public function setMessage(?string $message): Recipient
    {
        $this->message = $message;

        return $this;
    }
}
