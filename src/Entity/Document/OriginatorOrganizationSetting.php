<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class OriginatorOrganizationSetting
 *
 * @package SignNow\Api\Entity\Document
 */
class OriginatorOrganizationSetting
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $setting;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $value;

    /**
     * @return null|string
     */
    public function getSetting(): ?string
    {
        return $this->setting;
    }

    /**
     * @param string $setting
     *
     * @return OriginatorOrganizationSetting
     */
    public function setSetting(string $setting): OriginatorOrganizationSetting
    {
        $this->setting = $setting;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return OriginatorOrganizationSetting
     */
    public function setValue(string $value): OriginatorOrganizationSetting
    {
        $this->value = $value;

        return $this;
    }
}
