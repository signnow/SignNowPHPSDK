<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\V2;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Collection
 *
 * @package SignNow\Api\Entity\V2
 */
class Collection
{
    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $data = [];
    
    /**
     * @var Meta
     * @Serializer\Type("SignNow\Api\Entity\V2\Meta")
     */
    protected $meta;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return Meta
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }
}
