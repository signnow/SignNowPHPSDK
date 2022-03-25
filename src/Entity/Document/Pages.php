<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Pages
 *
 * @package SignNow\Api\Entity\Document
 */
class Pages
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $src;

    /**
     * @var PageSize
     * @Serializer\Type("SignNow\Api\Entity\Document\PageSize")
     */
    private $size;

    /**
     * @return null|string
     */
    public function getSrc(): ?string
    {
        return $this->src;
    }

    /**
     * @param string $src
     *
     * @return Pages
     */
    public function setSrc(string $src): Pages
    {
        $this->src = $src;

        return $this;
    }

    /**
     * @return null|PageSize
     */
    public function getSize(): ?PageSize
    {
        return $this->size;
    }

    /**
     * @param PageSize $size
     *
     * @return Pages
     */
    public function setSize(PageSize $size): Pages
    {
        $this->size = $size;

        return $this;
    }
}
