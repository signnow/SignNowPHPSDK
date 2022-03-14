<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\Field;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SignatureField
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
class SignatureField extends AbstractField
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $type = 'signature';
}
