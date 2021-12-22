<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\V2;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Meta
 *
 * @package SignNow\Api\Entity\V2
 */
class Meta
{
    /**
     * @var Pagination
     * @Serializer\Type("SignNow\Api\Entity\V2\Pagination")
     */
    protected $pagination;

    /**
     * @return Pagination
     */
    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}
