<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Download
 *
 * @HttpEntity("document/{id}/download", idProperty="")
 * @ResponseType("SignNow\Rest\Entity\Binary")
 *
 * @package SignNow\Api\Entity\Document
 */
class Download extends Entity
{
}
