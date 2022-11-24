<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document\MoveDocument;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class MoveDocumentResponse
 *
 * @package SignNow\Api\Entity\Document\Move
 */
class MoveDocumentResponse
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $result;

    /**
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param string $result
     *
     * @return MoveDocumentResponse
     */
    public function setResult(string $result): self
    {
        $this->result = $result;

        return $this;
    }
}
