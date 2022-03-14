<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\Invite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class EmbeddedInvites
 *
 * @package SignNow\Api\Entity\Embedded\Invite
 */
class EmbeddedInvites extends Entity
{
    /**
     * @var Invite[]
     * @Serializer\Type("array<SignNow\Api\Entity\Embedded\Invite\Invite>")
     */
    private $data;

    /**
     * EmbeddedInvites constructor
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getInvites(): array
    {
        return $this->data;
    }
}
