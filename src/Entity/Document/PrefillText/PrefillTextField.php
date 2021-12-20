<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document\PrefillText;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class PrefillTextField
 *
 * @HttpEntity("v2/documents/{documentUniqueId}/prefill-texts", idProperty="")
 *
 * @package SignNow\Api\Entity\Document
 */
class PrefillTextField extends Entity
{
    /**
     * @var FieldRequest[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\PrefillText\FieldRequest>")
     */
    private $fields;

    /**
     * PrefillTextField constructor.
     *
     * @param FieldRequest[] $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return FieldRequest[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
