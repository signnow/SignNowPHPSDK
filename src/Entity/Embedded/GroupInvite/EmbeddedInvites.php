<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class EmbeddedInvites
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class EmbeddedInvites
{
    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $data;

    /**
     * EmbeddedInvites constructor.
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
    public function getInviteUniqueId(): ?string
    {
        return $this->data['id'] ?? null;
    }
}
