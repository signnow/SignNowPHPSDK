<?php

declare(strict_types=1);

namespace SignNow\Api\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Status
 *
 * @package SignNow\Api\Entity
 */
class Status
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
}
