<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Role
 *
 * @package SignNow\Api\Entity
 */
class Role
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $uniqueId;
    
    /**
     * @var int
     * @Serializer\Type("int")
     */
    protected $signingOrder;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $name;
    
    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * @param null|string $name
     *
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }
    
    /**
     * @param string $uniqueId
     *
     * @return Role
     */
    public function setUniqueId(string $uniqueId): self
    {
        $this->uniqueId = $uniqueId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSigningOrder()
    {
        return $this->signingOrder;
    }
    
    /**
     * @param int $signingOrder
     *
     * @return Role
     */
    public function setSigningOrder($signingOrder): self
    {
        $this->signingOrder = $signingOrder;
        
        return $this;
    }
}
