<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class DownloadLink
 *
 * @HttpEntity("document/{id}/download/link", idProperty="")
 *
 * @package SignNow\Api\Entity\Document
 */
class DownloadLink extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $link;
    
    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }
}
