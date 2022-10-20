<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\SmartField;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class SmartField
 *
 * @HttpEntity("document/{documentUniqueId}/integration/object/smartfields", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Document\SmartField\SmartFieldResponse")
 *
 * @package SignNow\Api\Entity\Document\SmartField
 */
class SmartField extends Entity
{
    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $data;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addField(string $key, string $value): SmartField
    {
        $this->data[][$key] = $value;

        return $this;
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function setFields(array $fields): SmartField
    {
        $this->data = $fields;

        return $this;
    }
}
