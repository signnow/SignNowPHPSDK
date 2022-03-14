<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\PrefillText;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class FieldRequest
 *
 * @package SignNow\Api\Entity\Document\PrefillText
 */
class FieldRequest
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $fieldName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $prefilledText;

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * @param string $fieldName
     *
     * @return FieldRequest
     */
    public function setFieldName(string $fieldName): FieldRequest
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefilledText(): string
    {
        return $this->prefilledText;
    }

    /**
     * @param string $prefilledText
     *
     * @return FieldRequest
     */
    public function setPrefilledText(string $prefilledText): FieldRequest
    {
        $this->prefilledText = $prefilledText;

        return $this;
    }
}
