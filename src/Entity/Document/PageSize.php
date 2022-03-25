<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class PageSize
 *
 * @package SignNow\Api\Entity\Document
 */
class PageSize
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $width = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $height = 0;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return PageSize
     */
    public function setWidth(int $width): PageSize
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return PageSize
     */
    public function setHeight(int $height): PageSize
    {
        $this->height = $height;

        return $this;
    }
}
