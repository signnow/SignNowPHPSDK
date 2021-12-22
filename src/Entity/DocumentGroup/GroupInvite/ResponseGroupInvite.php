<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class ResponseGroupInvite
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class ResponseGroupInvite extends Entity
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
    private $pendingInviteLink;
    
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
     * @return ResponseGroupInvite
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getPendingInviteLink(): ?string
    {
        return $this->pendingInviteLink;
    }
    
    /**
     * @param string $pendingInviteLink
     *
     * @return ResponseGroupInvite
     */
    public function setPendingInviteLink(string $pendingInviteLink): self
    {
        $this->pendingInviteLink = $pendingInviteLink;
        
        return $this;
    }
}
