<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class InviteAction
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class InviteAction extends Entity
{
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
     * @var int
     * @Serializer\Type("int")
     */
    private $declineBySignature = 0;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $roleName;
    
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $action;
    
    /**
     * @var Authentication
     * @Serializer\Type("SignNow\Api\Entity\DocumentGroup\GroupInvite\Authentication")
     * @Serializer\SkipWhenEmpty()
     */
    private $authentication;
    
    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $allowReassign = false;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $redirectUri;
    
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
     * @return InviteAction
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
     * @return InviteAction
     */
    public function setDocumentId(string $documentId): self
    {
        $this->documentId = $documentId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getDeclineBySignature(): int
    {
        return $this->declineBySignature;
    }
    
    /**
     * @param int $declineBySignature
     *
     * @return InviteAction
     */
    public function setDeclineBySignature(int $declineBySignature): self
    {
        $this->declineBySignature = $declineBySignature;
        
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
     * @return InviteAction
     */
    public function setRoleName(string $roleName): self
    {
        $this->roleName = $roleName;
        
        return $this;
    }
    
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
     * @return InviteAction
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        
        return $this;
    }
    
    /**
     * @return Authentication
     */
    public function getAuthentication(): Authentication
    {
        return $this->authentication;
    }
    
    /**
     * @param Authentication $authentication
     *
     * @return InviteAction
     */
    public function setAuthentication(Authentication $authentication): self
    {
        $this->authentication = $authentication;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isAllowReassign(): bool
    {
        return $this->allowReassign;
    }
    
    /**
     * @param int|bool|string $allowReassign
     *
     * @return InviteAction
     */
    public function setAllowReassign($allowReassign = true): self
    {
        $this->allowReassign = is_string($allowReassign) ? $allowReassign === true : (bool) $allowReassign;
        
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    /**
     * @param string $redirectUri
     *
     * @return InviteAction
     */
    public function setRedirectUri(string $redirectUri): InviteAction
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }
}
