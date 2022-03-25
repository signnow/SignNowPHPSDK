<?php

declare(strict_types=1);

namespace SignNow\Api\Action\Data\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetDocumentRequestParams
 *
 * @package SignNow\Api\Action\Data\Document
 */
class GetDocumentRequestParams
{
    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $withData = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $withAnnotation = false;

    /**
     * @var bool
     * @Serializer\Type("string")
     */
    private $isCustomFolder = false;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $exclude = [];

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $include = [];

    /**
     * @return bool
     */
    public function isWithData(): bool
    {
        return $this->withData;
    }

    /**
     * With image data
     *
     * @param bool $withData
     *
     * @return $this
     */
    public function setWithData(bool $withData = true): self
    {
        $this->withData = $withData;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWithAnnotation(): bool
    {
        return $this->withAnnotation;
    }

    /**
     * With annotation - include information about integration objects
     *
     * @param bool $withAnnotation
     *
     * @return $this
     */
    public function setWithAnnotation(bool $withAnnotation = true): self
    {
        $this->withAnnotation = $withAnnotation;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCustomFolder(): bool
    {
        return $this->isCustomFolder;
    }

    /**
     * Allow searching parent folder in user custom folders
     *
     * @param bool $isCustomFolder
     *
     * @return $this
     */
    public function setIsCustomFolder(bool $isCustomFolder = true): self
    {
        $this->isCustomFolder = $isCustomFolder;

        return $this;
    }

    /**
     * @return array
     */
    public function getExclude(): array
    {
        return $this->exclude;
    }

    /**
     * Specify pre-defined document parameters that API response should not content
     *
     * @param array $exclude
     *
     * @return $this
     */
    public function setExclude(array $exclude): self
    {
        $this->exclude = $exclude;

        return $this;
    }

    /**
     * @return array
     */
    public function getInclude(): array
    {
        return $this->include;
    }

    /**
     * Specify pre-defined parameters to retrieve document details
     *
     * @param array $include
     *
     * @return $this
     */
    public function setInclude(array $include): self
    {
        $this->include = $include;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'with_data' => $this->bool2str($this->isWithData()),
            'with_annotation' => $this->bool2str($this->isWithAnnotation()),
            'is_custom_folder' => $this->bool2str($this->isCustomFolder()),
            'exclude' => implode(',', $this->getExclude()),
            'include' => implode(',', $this->getInclude()),
        ];
    }

    /**
     * @param bool $value
     *
     * @return string
     */
    private function bool2str(bool $value): string
    {
        return $value === true ? 'true' : 'false';
    }
}
