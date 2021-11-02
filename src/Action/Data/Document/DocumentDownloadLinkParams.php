<?php
declare(strict_types=1);

namespace SignNow\Api\Action\Data\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class DocumentDownloadLinkParams
 *
 * @package SignNow\Api\Action\Data\Document
 */
class DocumentDownloadLinkParams
{
    /**
     * @see DownloadType::class
     * @var string
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $withHistory;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $base64;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $clientTimestamp;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return DocumentDownloadLinkParams
     */
    public function setType(string $type): DocumentDownloadLinkParams
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getWithHistory(): string
    {
        return $this->withHistory ?? '0';
    }

    /**
     * @param string $withHistory
     *
     * @return DocumentDownloadLinkParams
     */
    public function setWithHistory(string $withHistory = '1'): DocumentDownloadLinkParams
    {
        $this->withHistory = $withHistory;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBase64(): bool
    {
        return $this->base64 ?? false;
    }

    /**
     * @param bool $base64
     *
     * @return DocumentDownloadLinkParams
     */
    public function setBase64(bool $base64 = true): DocumentDownloadLinkParams
    {
        $this->base64 = $base64;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientTimestamp(): string
    {
        return $this->clientTimestamp ?? '0';
    }

    /**
     * @param string $clientTimestamp
     *
     * @return DocumentDownloadLinkParams
     */
    public function setClientTimestamp(string $clientTimestamp = '1'): DocumentDownloadLinkParams
    {
        $this->clientTimestamp = $clientTimestamp;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'with_history' => $this->getWithHistory(),
            'base64' => $this->bool2str($this->isBase64()),
            'client_timestamp' => $this->getClientTimestamp(),
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
