<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;
use SplFileInfo;

/**
 * Class FieldExtract
 *
 * @HttpEntity("document/fieldextract", idProperty="")
 * @GuzzleRequestBody("multipart")
 * @ResponseType("SignNow\Api\Entity\Document\Document")
 *
 * @package SignNow\Api\Entity\Document
 */
class FieldExtract extends Upload
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @SerializedName("Tags")
     */
    private $tags;

    /**
     * FieldExtract constructor.
     *
     * @param SplFileInfo $file
     * @param array       $tags
     */
    public function __construct(SplFileInfo $file, array $tags = [])
    {
        parent::__construct($file);
        $this->tags = json_encode($tags);
    }
}
