<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\SigningLink;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SigningLink
 *
 * @package SignNow\Api\Entity\Embedded\SigningLink
 */
class SigningLink
{
    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $data;

    /**
     * SigningLink constructor.
     * 
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    /**
     * @return null|string
     */
    public function getLink(): ?string
    {
        return $this->data['link'] ?? null;
    }
}
