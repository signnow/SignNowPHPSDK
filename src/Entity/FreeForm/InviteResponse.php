<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\FreeForm;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class InviteResponse
 *
 * @package SignNow\Api\Entity\FreeForm
 */
class InviteResponse
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $result;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $id;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $callbackUrl;
    
    /**
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }
    
    /**
     * @param string $result
     *
     * @return InviteResponse
     */
    public function setResult(string $result): self
    {
        $this->result = $result;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    
    /**
     * @param string $id
     *
     * @return InviteResponse
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }
    
    /**
     * @param string $callbackUrl
     *
     * @return InviteResponse
     */
    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;
        
        return $this;
    }
}
