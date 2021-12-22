<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class Step
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class Step extends Entity
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
     * @var null|int
     * @Serializer\Type("int")
     */
    private $order;
    
    /**
     * @var Action[]
     * @Serializer\Type("array<SignNow\Api\Entity\DocumentGroup\GroupInvite\Action>")
     */
    private $actions = [];
    
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
     * @return Step
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * @return null|int
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    
    /**
     * @param int $order
     *
     * @return Step
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;
        
        return $this;
    }
    
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
     * @return Step
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Action[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }
    
    /**
     * @param Action[] $actions
     *
     * @return Step
     */
    public function setActions(array $actions): self
    {
        $this->actions = $actions;
        
        return $this;
    }
}
