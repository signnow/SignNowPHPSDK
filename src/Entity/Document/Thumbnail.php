<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Thumbnail
 *
 * @package SignNow\Api\Entity\Document
 */
class Thumbnail
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $small;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $medium;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $large;

    /**
     * @return null|string
     */
    public function getSmall(): ?string
    {
        return $this->small;
    }

    /**
     * @param string $small
     *
     * @return Thumbnail
     */
    public function setSmall(string $small): Thumbnail
    {
        $this->small = $small;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMedium(): ?string
    {
        return $this->medium;
    }

    /**
     * @param string $medium
     *
     * @return Thumbnail
     */
    public function setMedium(string $medium): Thumbnail
    {
        $this->medium = $medium;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLarge(): ?string
    {
        return $this->large;
    }

    /**
     * @param string $large
     *
     * @return Thumbnail
     */
    public function setLarge(string $large): Thumbnail
    {
        $this->large = $large;

        return $this;
    }
}
