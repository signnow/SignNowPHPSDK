<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\Field;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractField
 *
 * @package SignNow\Api\Entity\Document\Field
 */
abstract class AbstractField
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $type;

    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    protected $pageNumber;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $role;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    protected $required = false;

    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    protected $height;

    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    protected $width;

    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    protected $x;

    /**
     * @var int|null
     * @Serializer\Type("int")
     */
    protected $y;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return AbstractField
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int|null
     */
    public function getPageNumber(): ?int
    {
        return $this->pageNumber;
    }

    /**
     * @param int|null $pageNumber
     *
     * @return AbstractField
     */
    public function setPageNumber(?int $pageNumber): self
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return AbstractField
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     *
     * @return AbstractField
     */
    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     *
     * @return AbstractField
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return AbstractField
     */
    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return AbstractField
     */
    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getX(): ?int
    {
        return $this->x;
    }

    /**
     * @param int|null $x
     *
     * @return AbstractField
     */
    public function setX(?int $x): self
    {
        $this->x = $x;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * @param int|null $y
     *
     * @return AbstractField
     */
    public function setY(?int $y): self
    {
        $this->y = $y;

        return $this;
    }
}
