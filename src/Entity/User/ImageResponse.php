<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\User;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ImageResponse
 *
 * @package SignNow\Api\Entity\User
 */
class ImageResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $width;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $height;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $created;

    /**
     * This field is in use fot GET /user/initial
     * base64 encoded image data
     *
     * @var null|string
     *
     * @Serializer\Type("string")
     */
    private $data;

    /**
     * This field is in use fot GET /user/initial
     *
     * @var null|string
     *
     * @Serializer\Type("string")
     */
    private $uniqueId;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->uniqueId ?? $this->id;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
}
