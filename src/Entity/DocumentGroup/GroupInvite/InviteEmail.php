<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class InviteEmail
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class InviteEmail extends Entity
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $email;
    
    /**
     * @var Reminder
     * @Serializer\Type("SignNow\Api\Entity\DocumentGroup\GroupInvite\Reminder")
     */
    private $reminder;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $subject;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $message;
    
    /**
     * @var null|int
     * @Serializer\Type("int")
     */
    private $expirationDays;
    
    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     *
     * @return InviteEmail
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
    
        return $this;
    }
    
    /**
     * @return Reminder
     */
    public function getReminder(): Reminder
    {
        return $this->reminder;
    }
    
    /**
     * @param Reminder $reminder
     *
     * @return InviteEmail
     */
    public function setReminder(Reminder $reminder): self
    {
        $this->reminder = $reminder;
        
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    
    /**
     * @param string $subject
     *
     * @return InviteEmail
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;
    
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    
    /**
     * @param string $message
     *
     * @return InviteEmail
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
    
        return $this;
    }
    
    /**
     * @return null|int
     */
    public function getExpirationDays(): ?int
    {
        return $this->expirationDays;
    }
    
    /**
     * @param int $expirationDays
     *
     * @return InviteEmail
     */
    public function setExpirationDays(int $expirationDays): self
    {
        $this->expirationDays = $expirationDays;
    
        return $this;
    }
}
