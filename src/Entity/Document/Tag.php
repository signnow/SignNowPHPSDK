<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Tags
 *
 * @package SignNow\Api\Entity\Document
 */
class Tag
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Tag
     */
    public function setType(string $type): Tag
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Tag
     */
    public function setName(string $name): Tag
    {
        $this->name = $name;

        return $this;
    }
}
