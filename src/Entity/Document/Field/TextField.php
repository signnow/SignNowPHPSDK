<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Document\Field;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class TextField
 *
 * @method $this setY(?int $y)
 * @method $this setX(?int $x)
 * @method $this setWidth(?int $width)
 * @method $this setHeight(?int $height)
 * @method $this setRequired(bool $required)
 * @method $this setRole(?string $role)
 * @method $this setPageNumber(?int $pageNumber)
 * @method $this setName(?string $name)
 * @method $this setId(?string $id)
 *
 * @package SignNow\Api\Entity\Document\Field
 */
class TextField extends AbstractField
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $type = 'text';
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $prefilledText;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $label;
    
    /**
     * @return string|null
     */
    public function getPrefilledText(): ?string
    {
        return $this->prefilledText;
    }
    
    /**
     * @param string|null $prefilledText
     *
     * @return TextField
     */
    public function setPrefilledText(?string $prefilledText): self
    {
        $this->prefilledText = $prefilledText;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    
    /**
     * @param string|null $label
     *
     * @return TextField
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;
        
        return $this;
    }
}
