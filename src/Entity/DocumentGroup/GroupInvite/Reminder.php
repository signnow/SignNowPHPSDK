<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class Reminder
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class Reminder extends Entity
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    private $remindBefore;
    
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    private $remindAfter;
    
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    private $remindRepeat;
    
    /**
     * @return int|null
     */
    public function getRemindBefore(): ?int
    {
        return $this->remindBefore;
    }
    
    /**
     * @param int $remindBefore
     *
     * @return Reminder
     */
    public function setRemindBefore(int $remindBefore): self
    {
        $this->remindBefore = $remindBefore;
        
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getRemindAfter(): ?int
    {
        return $this->remindAfter;
    }
    
    /**
     * @param int $remindAfter
     *
     * @return Reminder
     */
    public function setRemindAfter(int $remindAfter): self
    {
        $this->remindAfter = $remindAfter;
    
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getRemindRepeat(): ?int
    {
        return $this->remindRepeat;
    }
    
    /**
     * @param int $remindRepeat
     *
     * @return Reminder
     */
    public function setRemindRepeat(int $remindRepeat): self
    {
        $this->remindRepeat = $remindRepeat;
    
        return $this;
    }
}
