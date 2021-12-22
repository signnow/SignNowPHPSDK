<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ExportedTo
 *
 * @package SignNow\Api\Entity\Document
 */
class ExportedTo
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $exportDomain;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $isExported = false;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $exportedUserIds = [];

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $storages = [];

    /**
     * @return null|string
     */
    public function getExportDomain(): ?string
    {
        return $this->exportDomain;
    }

    /**
     * @param string $exportDomain
     *
     * @return ExportedTo
     */
    public function setExportDomain(string $exportDomain): ExportedTo
    {
        $this->exportDomain = $exportDomain;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExported(): bool
    {
        return $this->isExported;
    }

    /**
     * @param bool $isExported
     *
     * @return ExportedTo
     */
    public function setIsExported(bool $isExported): ExportedTo
    {
        $this->isExported = $isExported;

        return $this;
    }

    /**
     * @return array
     */
    public function getExportedUserIds(): array
    {
        return $this->exportedUserIds;
    }

    /**
     * @param array $exportedUserIds
     *
     * @return ExportedTo
     */
    public function setExportedUserIds(array $exportedUserIds): ExportedTo
    {
        $this->exportedUserIds = $exportedUserIds;

        return $this;
    }

    /**
     * @return array
     */
    public function getStorages(): array
    {
        return $this->storages;
    }

    /**
     * @param array $storages
     *
     * @return ExportedTo
     */
    public function setStorages(array $storages): ExportedTo
    {
        $this->storages = $storages;

        return $this;
    }
}
