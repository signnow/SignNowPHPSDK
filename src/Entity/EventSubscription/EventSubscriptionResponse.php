<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\EventSubscription;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class EventSubscriptionResponse
 *
 * @package SignNow\Api\Entity\EventSubscription
 */
class EventSubscriptionResponse
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $id;
    
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    private $created;
    
    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    private $updated;
    
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    
    /**
     * @return int|null
     */
    public function getCreated(): ?int
    {
        return $this->created;
    }
    
    /**
     * @return int|null
     */
    public function getUpdated(): ?int
    {
        return $this->updated;
    }
}
