<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\EventSubscription;

use SignNow\Rest\Entity\Entity;
use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CreateEventSubscription
 *
 * @HttpEntity("event_subscription", idProperty="")
 * @ResponseType("SignNow\Api\Entity\EventSubscription\EventSubscriptionResponse")
 *
 * @package SignNow\Api\Entity\EventSubscription
 */
class CreateEventSubscription extends Entity
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $event;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $callbackUrl;
    
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    private $useTls12;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $integrationId;
    
    /**
     * @var boolean|null
     * @Serializer\Type("boolean")
     */
    private $docidQueryparam;
    
    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }
    
    /**
     * @param string $event
     *
     * @return $this
     */
    public function setEvent(string $event): self
    {
        $this->event = $event;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }
    
    /**
     * @param string $callbackUrl
     *
     * @return $this
     */
    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;
        
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getUseTls12(): ?int
    {
        return $this->useTls12;
    }
    
    /**
     * @param int|null $useTls12
     *
     * @return $this
     */
    public function setUseTls12(?int $useTls12): self
    {
        $this->useTls12 = $useTls12;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }
    
    /**
     * @param string|null $integrationId
     *
     * @return $this
     */
    public function setIntegrationId(?string $integrationId): self
    {
        $this->integrationId = $integrationId;
        
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function getDocidQueryparam(): ?bool
    {
        return $this->docidQueryparam;
    }
    
    /**
     * @param bool|null $docidQueryparam
     *
     * @return $this
     */
    public function setDocidQueryparam(?bool $docidQueryparam): self
    {
        $this->docidQueryparam = $docidQueryparam;
        
        return $this;
    }
}
