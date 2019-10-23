<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;
use SplFileInfo;

/**
 * Class Upload
 *
 * @HttpEntity("document", idProperty="")
 * @GuzzleRequestBody("multipart")
 * @ResponseType("SignNow\Api\Entity\Document\Document")
 *
 * @package SignNow\Api\Entity\Document
 */
class Upload extends Entity
{
    /**
     * @var SplFileInfo
     * @Serializer\Type("SplFileInfo")
     */
    protected $file;

    /**
     * Upload constructor.
     *
     * @param SplFileInfo $file
     */
    public function __construct(SplFileInfo $file)
    {
        $this->file = $file;
    }
}
