<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\SmartField;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SmartFieldResponse
 *
 * @package SignNow\Api\Entity\Document\SmartField
 */
class SmartFieldResponse
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $status;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return SmartFieldResponse
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
