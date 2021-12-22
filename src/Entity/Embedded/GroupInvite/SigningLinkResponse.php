<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SigningLinkResponse
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class SigningLinkResponse
{
    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $data;

    /**
     * SigningLinkResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->data['link'] ?? null;
    }
}
