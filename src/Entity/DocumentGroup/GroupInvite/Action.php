<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class Action
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class Action extends Entity
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $action;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $email;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $documentId;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $documentName;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $status;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $roleName;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $signingInstructions;
    
    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    private $isFullDeclined = false;
    
    /**
     * @return null|string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    
    /**
     * @param string $action
     *
     * @return Action
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        
        return $this;
    }
    
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
     * @return Action
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
    
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }
    
    /**
     * @param string $documentId
     *
     * @return Action
     */
    public function setDocumentId(string $documentId): self
    {
        $this->documentId = $documentId;
    
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }
    
    /**
     * @param string $documentName
     *
     * @return Action
     */
    public function setDocumentName(string $documentName): self
    {
        $this->documentName = $documentName;
        
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
     * @return Action
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
    
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getRoleName(): ?string
    {
        return $this->roleName;
    }
    
    /**
     * @param string $roleName
     *
     * @return Action
     */
    public function setRoleName(string $roleName): self
    {
        $this->roleName = $roleName;
    
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getSigningInstructions(): ?string
    {
        return $this->signingInstructions;
    }
    
    /**
     * @param string $signingInstructions
     *
     * @return Action
     */
    public function setSigningInstructions(string $signingInstructions): self
    {
        $this->signingInstructions = $signingInstructions;
    
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isFullDeclined(): bool
    {
        return $this->isFullDeclined;
    }
    
    /**
     * @param bool $isFullDeclined
     *
     * @return Action
     */
    public function setIsFullDeclined(bool $isFullDeclined): self
    {
        $this->isFullDeclined = $isFullDeclined;
    
        return $this;
    }
}
