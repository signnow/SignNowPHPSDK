<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class Invite
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class Invite extends Entity
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $status;
    
    /**
     * @var Step[]
     * @Serializer\Type("array<SignNow\Api\Entity\DocumentGroup\GroupInvite\Step>")
     */
    private $steps;
    
    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    
    /**
     * @param string $id
     *
     * @return Invite
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    
    /**
     * @param string $status
     *
     * @return Invite
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
    
        return $this;
    }
    
    /**
     * @return Step[]
     */
    public function getSteps(): array
    {
        return $this->steps;
    }
    
    /**
     * @param Step[] $steps
     *
     * @return Invite
     */
    public function setSteps(array $steps): self
    {
        $this->steps = $steps;
    
        return $this;
    }
}
