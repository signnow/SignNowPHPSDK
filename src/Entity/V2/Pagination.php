<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\V2;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Pagination
 *
 * @package SignNow\Api\Entity\V2
 */
class Pagination
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $total = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $count = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $perPage = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $currentPage = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $totalPages = 0;

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }
}
