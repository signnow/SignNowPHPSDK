<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Invite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Response
 *
 * @package SignNow\Api\Entity\Invite
 */
class Response
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $status;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }
}
