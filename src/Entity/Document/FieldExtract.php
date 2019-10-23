<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Document;

use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

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

}
